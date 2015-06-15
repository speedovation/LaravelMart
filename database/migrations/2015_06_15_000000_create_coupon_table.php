<?php

use Illuminate\Database\Migrations\Migration;

class CreateCouponTable extends Migration {

    public function up() {
        Schema::create("coupons", function($table) {
                    $table->engine = "InnoDB";
                    $table->increments("id");
                    
                    $table->string("code")->unique();
                    $table->string("type");
                    $table->integer("amount");
                    $table->timestamp('from');
                    $table->timestamp('to');
                    $table->boolean("can_club");
                    $table->integer("usage");
                    
                    $table->integer("order_minimum")->nullable();
                    $table->integer("order_maximum")->nullable();
                    
                    $table->string("products_included")->nullable();
                    $table->string("products_excluded")->nullable();

                    $table->string("categories_included")->nullable();
                    $table->string("categories_excluded")->nullable();
                    
                    $table->text("payment_methods");
                    $table->timestamps();
                    $table->softDeletes();
                });
    }

    public function down() {
        Schema::dropIfExists("coupons");
    }

}
