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
        Schema::create('coleur', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id');

        $table->string('body-bg')->nullable();
        $table->string('font-family-sans-serif')->nullable();
        $table->string('font-size-base')->nullable();
        $table->string('line-height-base')->nullable();
    
        $table->index('user_id');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
