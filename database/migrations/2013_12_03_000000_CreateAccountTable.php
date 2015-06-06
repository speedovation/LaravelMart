<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration {

    public function up() {
        Schema::create("account", function($table) {
                    $table->engine = "InnoDB";

                    $table->increments("id");
         			$table->string('email')->unique();
                    $table->string("password" , 60);
                    $table->string("username");
                    $table->rememberToken();
                    $table->timestamps();
                    $table->softDeletes();
                                   
			
			
			    });
    }

    public function down() {
        Schema::dropIfExists("account");
    }

}
