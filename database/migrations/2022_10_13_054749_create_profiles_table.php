<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('teacher_name');
            $table->string('profile_name')->nullable();
            $table->integer('ranking_score')->default(0);
            $table->integer('rating')->nullable();
            $table->string('nationality');
            $table->enum('gender', ['Male', 'Female']);
            $table->json('subjects_taught');
            $table->json('languages');
            $table->string('headline');
            $table->json('qualifications');
            $table->string('video_url')->nullable();
            $table->string('lesson_price')->nullable();
            $table->string('trial_price')->nullable();
            $table->string('trial_payment_url')->nullable();
            $table->string('trial_booking_link')->nullable();
            $table->string('booking_link')->nullable();
            $table->string('booking_password')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('email')->nullable();
            $table->string('twitter')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('line')->nullable();
            $table->string('wechat')->nullable();
            $table->string('skype')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->longText('about_me')->nullable();
            $table->enum('status', ['Active', 'Inactive']);
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
        Schema::dropIfExists('profiles');
    }
};
