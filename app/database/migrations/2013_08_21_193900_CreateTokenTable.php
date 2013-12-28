<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokenTable
extends Migration
{
    public function up()
    {
        Schema::create("token", function(Blueprint $table)
        {
            $table
                ->string("email")
                ->nullable()
                ->default(null);

            $table
                ->string("token")
                ->nullable()
                ->default(null);

            $table
                ->timestamp("created_at")
                ->nullable()
                ->default(null);
        });
    }

    public function down()
    {
        Schema::dropIfExists("token");
    }
}