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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->enum('user_type', ['admin', 'teacher']);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->enum('subscribe_plan', ['Basic', 'Monthly','Yearly'])->nullable();
            $table->enum('plan_status', ['Active','Trialing', 'Incomplete','Incomplete_expired','Past_due','Canceled','Unpaid'])->nullable();
            $table->enum('account_type', ['Free', '14 days trial','Paid','Unpaid'])->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
