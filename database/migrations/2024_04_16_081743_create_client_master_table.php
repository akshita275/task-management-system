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
        Schema::create('client_master', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('address');
            $table->string('city');
            $table->string('district');
            $table->string('state');
            $table->integer('phone');
            $table->string('email_address');
            $table->string('website');
            $table->text('logo');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_master');
    }
};