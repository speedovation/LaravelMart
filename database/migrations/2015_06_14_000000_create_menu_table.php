<?php

use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration {

    public function up() {
        Schema::create("menus", function($table) {
                    $table->engine = "InnoDB";
                    $table->increments("id");
                    $table->integer("parent_id")->nullable();
                    $table->string("name");
                    $table->timestamps();
                    $table->softDeletes();
                });
    }

    public function down() {
        Schema::dropIfExists("menus");
    }

}
