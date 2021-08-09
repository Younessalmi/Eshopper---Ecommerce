<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommandsProduits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::disableForeignKeyConstraints();
        Schema::create('commands_produits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produit_id')->constrained('produits')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('cammand_id')->constrained('commands')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
