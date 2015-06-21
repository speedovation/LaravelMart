<?php

use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration {

    public function up() {
        Schema::create("pages", function($table) {
                    $table->engine = "InnoDB";
                    $table->increments("id");
                    $table->integer("parent_id")->nullable();
                    $table->string("title");
                    $table->string("url")->unique();
                    //Draft, Pending Review, Live
                    $table->string("status");
                    //Public, Password, Private
                    $table->string("visibility");
                    
                    //Default is for now HTML 
                    //Supports later : MD, Textile and son on 
                    $table->string("type")->nullable();
                    
                    $table->longtext("body");
                    $table->text("header")->nullable();
                    $table->timestamps();
                    $table->softDeletes();
                });
    }

    public function down() {
        Schema::dropIfExists("pages");
    }

}
