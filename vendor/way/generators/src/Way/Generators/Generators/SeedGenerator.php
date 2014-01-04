<?php

namespace Way\Generators\Generators;

class SeedGenerator extends Generator {

    /**
     * Fetch the compiled template for a seed
     *
     * @param  string $template Path to template
     * @param  string $className
     * @return string Compiled template
     */
    protected function getTemplate($template, $className)
    {
        $this->template = $this->file->get($template);
        $models = strtolower(str_replace('TableSeeder', '', $className));

        $this->template = str_replace('{{className}}', $className, $this->template);

        return str_replace('{{models}}', $models, $this->template);
    }

    /**
    * Updates the DatabaseSeeder file's run method to
    * call this new seed class
    * @return void
    */
    public function updateDatabaseSeederRunMethod($className)
    {
        $databaseSeederPath = app_path() . '/database/seeds/DatabaseSeeder.php';

        $content = $this->file->get($databaseSeederPath);

        if ( ! strpos($content, "\$this->call('{$className}');"))
        {
            $content = preg_replace("/(run\(\).+?)}/us", "$1\t\$this->call('{$className}');\n\t}", $content);
            return $this->file->put($databaseSeederPath, $content);
        }

        return false;
    }

}