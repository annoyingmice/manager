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
        Schema::create('otps', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('user_id');
            $table->string('host');
            $table->string('otp')->unique();
            $table->dateTime('used_at')->nullable();
            $table->dateTime('revoke_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('otps', function (Blueprint $table) {
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
        Schema::table('otps', function (Blueprint $table) {
            $table->dropForeign('otps_user_id_foreign');
        });

        Schema::dropIfExists('otps');
    }
};
