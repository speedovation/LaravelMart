This Laravel 4 package provides a variety of generators to speed up your development process. These generators include:

- `generate:model`
- `generate:controller`
- `generate:seed`
- `generate:view`
- `generate:migration`
- `generate:resource`
- `generate:scaffold`
- `generate:form`
- `generate:test`
- `generate:pivot` <-- NEW!!

## Prefer a Video Walk-through?

[See here.](http://tutsplus.s3.amazonaws.com/tutspremium/courses_$folder$/WhatsNewInLaravel4/9-Generators.mp4)

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `way/generators`.

	"require": {
		"laravel/framework": "4.0.*",
		"way/generators": "dev-master"
	},
	"minimum-stability" : "dev"

Next, update Composer from the Terminal:

    composer update

Once this operation completes, the final step is to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

    'Way\Generators\GeneratorsServiceProvider'

That's it! You're all set to go. Run the `artisan` command from the Terminal to see the new `generate` commands.

    php artisan

> There's also a [Sublime Text plugin available](http://net.tutsplus.com/tutorials/tools-and-tips/pro-workflow-in-laravel-and-sublime-text/) to assist with the generators. Definitely use it, but not before you learn the syntax below.

## Usage

Think of generators as an easy way to speed up your workflow. Rather than opening the models directory, creating a new file, saving it, and adding the class, you can simply run a single generate command.

- [Migrations](#migrations)
- [Models](#models)
- [Views](#views)
- [Seeds](#seeds)
- [Resources](#resources)
- [Scaffolding](#scaffolding)
- [Forms](#forms)
- [Tests](#tests)
- [Pivot Tables](#pivot-tables)

### Migrations

Laravel 4 offers a migration generator, but it stops just short of creating the schema (or the fields for the table). Let's review a couple examples, using `generate:migration`.

    php artisan generate:migration create_posts_table

If we don't specify the `fields` option, the following file will be created within `app/database/migrations`.

```php
<?php

use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	  Schema::create('posts', function($table)
	  {
	    $table->increments('id');

	    $table->timestamps();
	  });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	  Schema::drop('posts');
	}

}
```

Notice that the generator is smart enough to detect that you're trying to create a table. When naming your migrations, make them as description as possible. The migration generator will detect the first word in your migration name and do its best to determine how to proceed. As such, for `create_posts_table`, the keyword is "create," which means that we should prepare the necessary schema to create a table.

If you instead use a migration name along the lines of `add_user_id_to_posts_table`, in that case, the keyword is "add," signaling that we intend to add rows to an existing table. Let's see what that generates.

    php artisan generate:migration add_user_id_to_posts_table

This will prepare the following boilerplate:

```php
<?php

use Illuminate\Database\Migrations\Migration;

class AddUserIdToPostsTable extends Migration {

    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	  Schema::table('posts', function($table)
	  {

	  });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	  Schema::table('posts', function($table)
	  {

	  });
	}

}
```

Notice how, this time, we're not doing `Schema::create`.

#### Keywords

When writing migration names, use the following keywords to provide hints for the generator.

- `create` or `make` (`create_users_table`)
- `add` or `insert` (`add_user_id_to_posts_table`)
- `remove` or `drop` or `delete` (`remove_user_id_from_posts_table`)

#### Generating Schema

This is pretty nice, but let's take things a step further and also generate the schema, using the `fields` option.

    php artisan generate:migration create_posts_table --fields="title:string, body:text"

Before we decipher this new option, let's see the output:

```php
<?php

use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	  Schema::create('posts', function($table)
	  {
	    $table->increments('id');
	    $table->string('title');
	    $table->text('body');
	    $table->timestamps();
	  });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	  Schema::drop('posts');
	}

}
```

Nice! A few things to notice here:

- The generator will automatically set the `id` as the primary key.
- It also will add the timestamps, as that's more common than not.
- It parsed the `fields` options, and added those fields.
- The drop method is smart enough to realize that, in reverse, the table should be dropped entirely.

To declare fields, use a comma-separated list of key:value:option sets, where `key` is the name of the field, `value` is the [column type](http://four.laravel.com/docs/schema#adding-columns), and `option` is a way to specify indexes and such, like `unique` or `nullable`. Here are some examples:

- `--fields="first:string, last:string"`
- `--fields="age:integer, yob:date"`
- `--fields="username:string:unique, age:integer:nullable"`
- `--fields="name:string:default('John'), email:string:unique:nullable"`
- `--fields="username:string[30]:unique, age:integer:nullable"`

Please make note of the last example, where we specify a character limit: `string[30]`. This will produce `$table->string('username', 30)->unique();`

It is possible to destroy the table by issuing:

	php artisan generate:migration destroy_posts_table
	
If you'd like to have an accurate artisan rollback option set the `fields` option as well:

	php artisan generate:migration destroy_posts_table --fields="title:string, body:text"

As a final demonstration, let's run a migration to remove the `completed` field from a `tasks` table.

    php artisan generate:migration remove_completed_from_tasks_table --fields="completed:boolean"

This time, as we're using the "remove" keyword, the generator understands that it should drop a column, and add it back in the `down()` method.

```php
<?php

use Illuminate\Database\Migrations\Migration;

class RemoveCompletedFromTasksTable extends Migration {

    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	  Schema::table('tasks', function($table)
	  {
	    $table->dropColumn('completed');
	  });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	  Schema::table('tasks', function($table)
	  {
	    $table->boolean('completed');
	  });
	}

}
```

### Models

    php artisan generate:model Post

This will create the file, `app/models/Post.php` and insert the following boilerplate:

```php
<?php

class Post extends Eloquent {

}
```

### Views

    php artisan generate:view dog

This command will generate `app/views/dog.blade.php` and a simple string, for convenience.

    The dog.blade.php view.

As with all of the commands, you may specify a `--path` option to place this file elsewhere.

    php artisan generate:view index --path=views/dogs

Now, we get: `app/views/dogs/index.blade.php`.

### Seeds

Laravel 4 provides us with a flexible way to seed new tables.

    php artisan generate:seed dogs

Set the argument to the name of the table that you'd like a seed file for. This will generate `app/database/seeds/DogsTableSeeder.php` and populate it with:

```php
<?php

class DogsTableSeeder extends Seeder {

  public function run()
  {
    $dogs = [

    ];

    DB::table('Dogs')->insert($dogs);
  }

}
```

This command will also update `app/database/seeds/DatabaseSeeder.php` to include a call to this new seed class, as required by Laravel.

To fully seed the `dogs` table:

- Within the `$dogs` array, add any number of arrays, containing the necessary rows.
- Return to the Terminal and run Laravel's `db:seed command` (`php artisan db:seed`).

### Resources

Think of the resource generator as the big enchilada. It calls all of its sibling generate commands. Assuming the following command:

    php artisan generate:resource dog --fields="name:string"

The following actions will take place:

- Creates a `create_dogs_table` migration, with a name column.
- Creates a `Dog.php` model.
- Creates a `views/dogs` folder, containing the `index`, `show`, `create`, and `edit` views.
- Creates a `database/seeds/DogsTableSeeder.php` seed file.
- Updates `DatabaseSeeder.php` to run `DogsTableSeeder`
- Creates `controllers/DogsController.php`, and fills it with restful methods.
- Updates `routes.php` to include: `Route::resource('dogs', 'DogsController')`.
- Creates a `tests/controllers/DogsControllerTest.php` file, and fills it with some boilerplate tests to get you started.

> Please note that the resource name is singular - the same as how you would name your model.

#### Workflow

Let's create a resource for displaying dogs in a restful way.

    php artisan generate:resource dog --fields="name:string, age:integer"

Next, we'll seed this new `dogs` table. Open `database/seeds/DogsTableSeeder.php` and add a couple of rows. Remember, you only need to edit the `$dogs` array within this file.

    $dogs = [
        ['name' => 'Sparky', 'age' => 5],
        ['name' => 'Joe', 'age' => 11]
    ];

Now, we migrate the database and seed the `dogs` table.

    php artisan migrate
    php artisan db:seed

Finally, let's display these two dogs, when accessing the `dogs/` route. Edit `controllers/DogsController.php`, and update the `index` method, like so:

    public function index()
    {
        return View::make('dogs.index')
    		->with('dogs', Dog::all());
    }

The last step is to update the view to display each of the posts that was passed to it. Open `views/dogs/index.blade.php` and add:

    <ul>
        @foreach($dogs as $dog)
    		<li>{{ $dog->name }} : {{ $dog->age }}</li>
    	@endforeach
    </ul>

Okay, okay, we're not using a layout file with the proper HTML. Who cares; this is just an example, fool.

Anyhow, we're all set. Run the server, and browse to `localhost:8000/dogs` to view your list.

    php artisan serve

- Sparky : 5
- Joe : 11

Isn't that way faster than manually doing all of that writing? To finish up, let's run the tests to make sure that everything is working, as expected.

    phpunit

And...it's green!

### Scaffolding

![scaffolding](https://dl.dropboxusercontent.com/u/774859/GitHub-Repos/scaffold-example.png)

Think of scaffolding as an extension of a resource. It has the exact same interface.

```bash
php artisan generate:scaffold tweet --fields="author:string, body:text"
```

The only difference is that it will handle all of the boilerplate. This can be particularly useful for prototyping - or even learning how to do basic things, such as delete a record from a database table, or build a form, or perform validation on that form.

![view scaffold](https://dl.dropboxusercontent.com/u/774859/GitHub-Repos/scaffold-view.png)

![view validation](https://dl.dropboxusercontent.com/u/774859/GitHub-Repos/scaffold-validation.png)

### Forms
This handy new generator allows you to, with a single command, generate the necessary HTML for a form, based on attributes from a provided model. Perhaps an example is in order:

```bash
php artisan generate:form tweet
```
Assuming that I do have a `Tweet` model and its associated `tweet` table, this command will output:

```html
{{ Form::open(array('route' => 'tweets.store')) }}
    <ul>
        <li>
            {{ Form::label('author', 'Author:') }}
            {{ Form::text('author') }}
        </li>

        <li>
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body') }}
        </li>

        <li>
            {{ Form::submit() }}
        </li>
    </ul>
{{ Form::close() }}
```
Pretty neat, huh? It read the attributes and data types, and prepared the markup for you! One less thing to worry about!

#### Specifying the Form's Method
But what if you intend to update a resource, rather than create a new one? Well, in that case, use the `--method` option.

```bash
php artisan generate:form tweet --method="update"
```

This will mostly generate the same HTML, however, the `Form::open()` method will be adjusted, as needed:

```php
{{ Form::open(array('method' => 'PATCH', 'route' => 'tweets.update')) }}
```

The method option will accept any number of values (*add, edit, update, post, create, etc.*), but, essentially, you're just telling it whether you are creating or editing a resource. As such, there's only two possible outputs: `POST` and `PATCH` (the former being the default).

#### Custom HTML

What if you don't like the idea of using an unordered list for a form? Use the `--html` option, along with the name of the element that you'd prefer to use:

```bash
php artisan generate:form tweet --html="div"
```
Now, the generator we'll present the elements within `div`s!

```html
{{ Form::open(array('route' => 'tweets.store')) }}
    <div>
        {{ Form::label('author', 'Author:') }}
        {{ Form::text('author') }}
    </div>

    <div>
        {{ Form::label('body', 'Body:') }}
        {{ Form::textarea('body') }}
    </div>

    <div>
        {{ Form::submit() }}
    </div>
{{ Form::close() }}
```

#### Copying and Saving

At least for now, and unlike the other generators in this package, this command will output the form, at which point you can copy and paste it where needed. Of course, you can always pipe the output to the clipboard or save to a file, using existing tools. For instance:

```bash
# copy the output to the clipboard
php artisan generate:form tweet | pbcopy

# save it to a form partial
php artisan generate:form tweet > app/views/posts/form.blade.php
```
### Tests

Use `generate:test` when you need to create a new PHPUnit test class. Here's an example:

```bash
php artisan generate:test FooTest
```

This will produce `app/tests/FooTest.php`.

```php
<?php

class FooTest extends TestCase {

    public function test()
    {

    }

}
```

### Pivot Tables

Creating joinable/pivot tables can sometimes be confusing.

- Should the table names be plural?
- In what order do we write the table names to make Laravel happy?
- What fields should be in the pivot table?

This process can be automated now. Simply call the `generate:pivot`
command, and provide the names of the tables that should be joinable.
For example, a post can have many tags, and a tag can have many posts.
Run the following command to create the necessary pivot table.

```bash
php artisan generate:pivot posts tags
```

It doesn't matter which order you provide the table names (or whether
you pluralize them or not). The command will correctly create a
`post_tag` migration that has `post_id` and `tag_id` fields.

```php
Schema::create('post_tag', function(Blueprint $table) {
    $table->integer('post_id');
    $table->integer('tag_id');
});
```


Finally, simply migrate the database to create it.

```bash
php artisan migrate
```

Pivot table finished!

To put it all together, let's do it from scratch. We need a posts table,
a tags table, and the connecting pivot table for the two. We can tackle
this easily with the generators.

```bash
php artisan generate:migration create_posts_table --fields="title:string, description:text"

php artisan generate:migration create_tags_table --fields="name:string"

php artisan generate:pivot posts tags
```

