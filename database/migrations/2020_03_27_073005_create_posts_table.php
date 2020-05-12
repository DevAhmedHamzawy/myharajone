<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->bigInteger('area_id');
            $table->bigInteger('user_id');
            $table->bigInteger('category_id');
            $table->text('tags');
            $table->text('services');
            $table->string('title');
            $table->longText('body');
            $table->string('telephone1');
            $table->string('telephone2');
            $table->string('email');
            $table->enum('show_contact_telephone1', ['نعم','لا']);
            $table->enum('show_contact_telephone2', ['نعم','لا']);
            $table->enum('show_contact_email', ['نعم','لا']);
            $table->integer('position');
            $table->enum('visible', ['نعم','لا']);
            $table->decimal('price', 10,2);
            $table->enum('ad_sort', ['للبيع','للإيجار','مهم','مطلوب عاجل','للإستثمار']);
            $table->enum('price_sort', ['اخرى','تعامل مباشر','غير قابل للتفاوض','على السوم','قابل للتفاوض']);
            $table->enum('payment_sort', ['نقداً','أقساط شهرية','على دفعات','شيك مصدق','أخرى']);
            $table->boolean('blacklist')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
