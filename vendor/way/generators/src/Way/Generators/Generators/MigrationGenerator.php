<?php

namespace Way\Generators\Generators;

class MigrationGenerator extends Generator {

    /**
     * Fetch the compiled template for a migration
     *
     * @param  string $template Path to template
     * @param  string $name
     * @return string Compiled template
     */
    protected function getTemplate($template, $name)
    {
        // We begin by fetching the master migration stub.
        $stub = $this->file->get(__DIR__.'/templates/migration/migration.txt');

        // Next, set the migration class name
        $stub = str_replace('{{name}}', \Str::studly($name), $stub);

        // Now, we're going to handle the tricky
        // work of creating the Schema
        $upMethod = $this->getUpStub();
        $downMethod = $this->getDownStub();

        // Finally, replace the migration stub with the dynamic up and down methods
        $stub = str_replace('{{up}}', $upMethod, $stub);
        $stub = str_replace('{{down}}', $downMethod, $stub);

        return $stub;
    }

    /**
     * Parse the migration name
     *
     * @param  string $name
     * @param  array $fields
     * @return MigrationGenerator
     */
    public function parse($name, $fields)
    {
        list($action, $tableName) = $this->parseMigrationName($name);

        $this->action = $action;
        $this->tableName = $tableName;
        $this->fields = $fields;

        return $this;
    }

    /**
    * Parse some_migration_name into array
    *
    * @param string $name
    * @return array
    */
    protected function parseMigrationName($name)
    {
        // create_users_table
        // add_user_id_to_posts_table
        // create_post_tag_table
        $pieces = explode('_', $name);

        // This is the action that the user
        // wants to take. Create or Delete or Add.
        $action = array_shift($pieces);

        // Adding _table to the migration name is optional
        if (end($pieces) == 'table') array_pop($pieces);

        // Next, we need to determine what the table name is.
        // This is tough, because it could be something like
        // posts, or posts_tags. Further, the migration name could
        // be 'create_posts_tags_table', or 'add_post_id_to_posts_tags_table'
        // So we'll search for the keywords 'to' or 'from'.
        $divider = array_search('to', $pieces);
        if ($divider === false) $divider = array_search('from', $pieces);

        // If we did find one of those "to" or "from" connecting words,
        // we know that what follows is the table name.
        $tableName = ($divider !== false)
            ? implode('_', array_slice($pieces, $divider + 1))
            : implode('_', $pieces);

        // For example: ['add', 'posts']
        return array($action, $tableName);
    }

    /**
    * Grab up method stub and replace template vars
    *
    * @return string
    */
    protected function getUpStub()
    {
        switch($this->action) {
            case 'add':
            case 'insert':
                $upMethod = $this->file->get(__DIR__ . '/templates/migration/migration-up.txt');
                $fields = $this->fields ? $this->setFields('addColumn') : '';
                break;

            case 'remove':
            case 'drop':
            case 'delete':
                $upMethod = $this->file->get(__DIR__ . '/templates/migration/migration-up.txt');
                $fields = $this->fields ? $this->setFields('dropColumn') : '';
                break;

            case 'pivot':
                $upMethod = $this->file->get(__DIR__ .'/templates/migration/migration-up-pivot.txt');
                $fields = $this->fields ? $this->setFields('addColumn') : '';
                break;

            case 'destroy':
                $upMethod = $this->file->get(__DIR__ . '/templates/migration/migration-up-drop.txt');
                $fields = $this->fields ? $this->setFields('dropColumn') : '';
                break;

            case 'create':
            case 'make':
            default:
                $upMethod = $this->file->get(__DIR__ . '/templates/migration/migration-up-create.txt');
                $fields = $this->fields ? $this->setFields('addColumn') : '';
                break;
        }

        // Replace the tableName in the template
        $upMethod = str_replace('{{tableName}}', $this->tableName, $upMethod);

        // Insert the schema into the up method
        return str_replace('{{methods}}', $fields, $upMethod);
    }

    /**
    * Grab down method stub and replace template vars
    *
    * @return string
    */
    protected function getDownStub()
    {
        switch($this->action) {
          case 'add':
          case 'insert':
            // then we to remove columns in reverse
            $downMethod = $this->file->get(__DIR__ . '/templates/migration/migration-down.txt');
            $fields = $this->fields ? $this->setFields('dropColumn') : '';
            break;

          case 'remove':
          case 'drop':
          case 'delete':
            // then we need to add the columns in reverse
            $downMethod = $this->file->get(__DIR__ . '/templates/migration/migration-down.txt');
            $fields = $this->fields ? $this->setFields('addColumn') : '';
            break;

          case 'destroy':
            // then we need to create the table in reverse
            $downMethod = $this->file->get(__DIR__ . '/templates/migration/migration-down-create.txt');
            $fields = $this->fields ? $this->setFields('addColumn') : '';
            break;

          case 'create':
          case 'make':
          default:
            // then we need to drop the table in reverse
            $downMethod = $this->file->get(__DIR__ . '/templates/migration/migration-down-drop.txt');
            $fields = $this->fields ? $this->setFields('dropColumn') : '';
            break;
        }

        // Replace the tableName in the template
        $downMethod = str_replace('{{tableName}}', $this->tableName, $downMethod);

        // Insert the schema into the down method
        return str_replace('{{methods}}', $fields, $downMethod);
    }

    /**
    * Create a string of the Schema fields that
    * should be inserted into the sub template.
    *
    * @param string $method (addColumn | dropColumn)
    * @return string
    */
    protected function setFields($method = 'addColumn')
    {
        $fields = $this->convertFieldsToArray();

        $template = array_map(array($this, $method), $fields);

        return implode("\n\t\t\t", $template);
    }

    /**
    * If Schema fields are specified, parse
    * them into an array of objects.
    *
    * So: name:string, age:integer
    * Becomes: [ ((object)['name' => 'string'], (object)['age' => 'integer'] ]
    *
    * @returns mixed
    */
    protected function convertFieldsToArray()
    {
        $fields = $this->fields;

        if ( !$fields ) return;

        $fields = preg_split('/, ?/', $fields);

        foreach($fields as &$bit)
        {
            $columnInfo = preg_split('/ ?: ?/', $bit);

            $bit = new \StdClass;
            $bit->name = array_shift($columnInfo);
            $bit->type = array_shift($columnInfo);

            // If there is a third key, then
            // the user is setting any number
            // of options
            if ( isset($columnInfo[0]) )
            {
                $bit->options = '';
                foreach($columnInfo as $option)
                {
                    $bit->options .= (str_contains($option, '('))
                        ? "->{$option}"
                        : "->{$option}()";
                }
            }
        }

        return $fields;
    }

    /**
    * Return template string for adding a column
    *
    * @param string $field
    * @return string
    */
    protected function addColumn($field)
    {
        // Let's see if they're setting
        // a limit, like: string[50]
        if ( str_contains($field->type, '[') )
        {
            preg_match('/([^\[]+?)\[(\d+)\]/', $field->type, $matches);
            $field->type = $matches[1]; // string
            $field->limit = $matches[2]; // 50
        }

        // We'll start building the appropriate Schema method
        $html = "\$table->{$field->type}";

        $html .= isset($field->limit)
            ? "('{$field->name}', {$field->limit})"
            : "('{$field->name}')";

        // Take care of any potential indexes or options
        if (isset($field->options))
        {
            $html .= $field->options;
        }

        return $html.';';
    }

    /**
    * Return template string for dropping a column
    *
    * @param string $field
    * @return string
    */
    protected function dropColumn($field)
    {
        return "\$table->dropColumn('" . $field->name . "');";
    }

    protected function getPath($path)
    {
        $migrationFile = strtolower(basename($path));

        return dirname($path).'/'.date('Y_m_d_His').'_'.$migrationFile;
    }

}
