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
        Schema::create('user_requests', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('company_id');
            $table->foreignId('user_id');
            $table->foreignId('request_type_id');
            $table->foreignId('status_id');
            $table->json('meta');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('request_type_id')
                ->references('id')
                ->on('request_types')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            
            $table->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_requests', function (Blueprint $table) {
            $table->dropForeign('user_requests_user_id_foreign');
            $table->dropForeign('user_requests_company_id_foreign');
            $table->dropForeign('user_requests_request_type_id_foreign');
            $table->dropForeign('user_requests_status_id_foreign');
        });
        Schema::dropIfExists('user_requests');
    }
};
