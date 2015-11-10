<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicaments', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('id_user');
            $table->integer('id_cis')->nullable();
            $table->integer('id_cip7')->nullable();
            $table->bigInteger('id_cip13')->nullable();
            $table->text('name');
            $table->text('description')->nullable();
            $table->text('forme')->nullable();
            $table->text('voie')->nullable();
            $table->text('remboursement')->nullable();
            $table->decimal('prix', 6, 2)->nullable();
            $table->text('classification')->nullable();
            $table->text('laboratoire')->nullable();
            $table->boolean('ordonnance')->nullable();
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
        Schema::drop('medicaments');
    }
}
