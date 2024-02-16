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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('ip');
            $table->foreignId('user_id')->nullable();
            $table->json('meta')->nullable();
            $table->string('action');
            $table->string('path');
            $table->string('roles')->nullable();
            $table->string('permissions')->nullable();
            $table->string('class');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('logs', function (Blueprint $table) {
            $table->dropForeign('logs_user_id_foreign');
        });
        Schema::dropIfExists('logs');
    }
};
