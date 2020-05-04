<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPremiumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_premium', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('membership_id');
            $table->integer('duration_id');
            $table->integer('bankaccount_id');
            $table->integer('mobile');
            $table->string('name');
            $table->decimal('price', 10,7);
            $table->date('transaction_date');
            $table->text('notes')->nullable();
            $table->boolean('ended')->nullable();
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
        Schema::dropIfExists('user_premium');
    }
}
