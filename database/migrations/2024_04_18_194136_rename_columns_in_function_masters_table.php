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
        Schema::table('function_masters', function (Blueprint $table) {
            $table->renameColumn('function_id','id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('function_masters', function (Blueprint $table) {
            $table->renameColumn('id','function_id');
        });
    }
};