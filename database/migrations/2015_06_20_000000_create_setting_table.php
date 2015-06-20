<?php

use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration {

    public function up() {
        Schema::create("settings", function($table) {
                    
                    $table->increments("id");
                    
                    $table->string("module");
                    $table->string("key")->unique();
                    
                    $table->string("value");
                    $table->string("options");
                    $table->text("comment");
                    
                    $table->timestamps();
                    $table->softDeletes();
                });
    }

    public function down() {
        Schema::dropIfExists("settings");
    }

}

