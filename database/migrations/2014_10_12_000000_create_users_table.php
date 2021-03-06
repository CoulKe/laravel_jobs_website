<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name');
            $table->string('username')->unique();
            $table->char('gender',10);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->char('position',10);
            $table->string('password');
            $table->integer('rate')->default(0);
            $table->char('skills',150)->default('Not listed');
            $table->text('profile_pic')->nullable();
            $table->text('about')->default('Not listed');
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
}
