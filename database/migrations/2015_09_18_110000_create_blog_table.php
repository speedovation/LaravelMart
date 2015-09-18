<?php

use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration {

    public function up() {
        Schema::create("blogs", function($table) {
                    $table->engine = "InnoDB";
                    $table->increments("id");
                    
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
                    
                    $table->integer('category_id');
                    $table->text("author")->default('Kara Guru');
                    $table->boolean('is_comments_allowed')->default(true);
                    $table->integer('comments_days')->default(0); //0 is unlimited days
                    
                    $table->timestamps();
                    $table->softDeletes();
                });
    }

    public function down() {
        Schema::dropIfExists("blogs");
    }

}
