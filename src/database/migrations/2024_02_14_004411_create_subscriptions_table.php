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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('payment_refno')->unique()->nullable();
            $table->foreignId('company_id');
            $table->foreignId('plan_id');
            $table->foreignId('payment_method_id')->nullable();
            $table->json('meta');
            $table->foreignId('status_id');
            $table->dateTime('expires_at');
            $table->timestamps();
            $table->softDeletes();

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
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropForeign('subscriptions_company_id_foreign');
        });
        Schema::dropIfExists('subscriptions');
    }
};
