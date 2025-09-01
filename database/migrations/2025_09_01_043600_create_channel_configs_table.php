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
        Schema::create('channel_configs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("channel_id")->nullable();
            $table->enum("channel_type", [0,1])->default(0)->comment("0=>private,1=>public");
            $table->unsignedBigInteger("seller_id")->nullable();
            $table->string('domain')->nullable();
            $table->string('api_key')->nullable();
            $table->string('api_key_secret')->nullable();
            $table->string('access_token')->nullable();
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channel_configs');
    }
};
