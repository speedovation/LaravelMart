<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

    public function up() {
        
        Schema::create("product", function($table) {
                    $table->engine = "InnoDB";

                    $table->increments("id");
                    $table->string("code");
                    $table->string("name");
                    $table->integer("stock");
                    
                    //mrp cost
                    $table->float("mrp");
                    
                    //selling price
                    $table->float("price");
                    
                    //discount in percentage
                    $table->float("discount");
                    
                    
                    $table->integer("category_id");
                    $table->string("image");
                    $table->text("short_desc");
                    $table->longText("long_desc");
                    $table->timestamps();
                    $table->softDeletes();
                });
    }

    public function down() {
        Schema::dropIfExists("product");
    }

}