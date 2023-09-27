<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            // $table->string('role')->nullable();
            // $table->string('status')->nullable();

            
            $table->enum('role', ['admin','responsable'])->default('admin');
            $table->enum('status', ['active','inactive'])->default('active');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};


// $table->foreignId('user_role_id')
            //     ->constrained('users_roles')
            //     ->references('id')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade')
            //     ->name('users_roles');

            // $table->foreignId('user_status_id')
            //     ->constrained('users_status')
            //     ->references('id')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade')
            //     ->name('users_status');