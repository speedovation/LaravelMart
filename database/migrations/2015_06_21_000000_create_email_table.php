<?php

use Illuminate\Database\Migrations\Migration;

class CreateEmailTable extends Migration {

    public function up() {
        Schema::create("emails", function($table) {
                    
                    $table->increments("id");
                    
                    $table->string("key")->unique();
                    $table->string("value");
                    $table->text("comment");
                    
                    $table->timestamps();
                    $table->softDeletes();
                });
    }

    public function down() {
        Schema::dropIfExists("emails");
    }

}

