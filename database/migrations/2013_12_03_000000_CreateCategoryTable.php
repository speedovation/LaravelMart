<?php

use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {

    public function up() {
        Schema::create("categories", function($table) {
                    $table->engine = "InnoDB";

                    $table->increments("id");
                    $table->integer("parent_id")->nullable();
                    
                    $table->string("name");
                    $table->string("desc")->nullable();
                    $table->string("icon")->nullable();
                    
                    //Draft, Pending Review, Live
                    $table->string("status");
                    
                    $table->timestamps();
                    $table->softDeletes();

                });
    }

    public function down() {
        Schema::dropIfExists("categories");
    }

}
