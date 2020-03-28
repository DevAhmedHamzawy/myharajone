<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estate_posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('post_id');
            $table->decimal('lat', 10, 7);
            $table->decimal('lng', 10, 7);
            $table->enum('destination', ['جنوب غرب','جنوب شرق','شمال غرب','شمال شرق','غرب','شرق','جنوب','شمال']);
            $table->enum('sort', ['سكنى تجارى','تجارى','سكنى','زراعى','أخرى']);
            $table->enum('contract', ['عقد على الشيوع','عقد فردى','عقد عرفى','عقد ملكية','أخرى']);
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
        Schema::dropIfExists('estate_posts');
    }
}
