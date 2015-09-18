<?php

use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration {

    public function up() {
        Schema::create("blogs", function($table) {
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
                    
                    $table->text("author")->default('Kara Guru');
                    $table->boolean('isCommentsAllowed')->default(true);
                    $table->integer('CommentsDays')->default(0); //0 is unlimited days
                    
                    $table->timestamps();
                    $table->softDeletes();
                });
    }

    public function down() {
        Schema::dropIfExists("blogs");
    }

}
