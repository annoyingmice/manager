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
        Schema::create('time_logs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('user_id');
            $table->foreignId('company_id');
            $table->datetime('time_in_am')->nullable();
            $table->datetime('time_out_am')->nullable();
            $table->datetime('time_in_pm')->nullable();
            $table->datetime('time_out_pm')->nullable();
            $table->string('otp')->unique();
            $table->json('meta');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('time_logs', function (Blueprint $table) {
            $table->dropForeign('time_logs_user_id_foreign');
            $table->dropForeign('time_logs_company_id_foreign');
        });
        Schema::dropIfExists('time_logs');
    }
};
