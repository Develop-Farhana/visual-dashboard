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
        Schema::create('data_entries', function (Blueprint $table) {
            $table->id();
            $table->year('end_year')->nullable();
            $table->string('citylng')->nullable();
            $table->string('citylat')->nullable();
            $table->string('intensity')->nullable();
            $table->string('sector')->nullable();
            $table->string('topic')->nullable();
            $table->string('insight')->nullable();
            $table->string('swot')->nullable();
            $table->string('url')->nullable();
            $table->string('region')->nullable();
            $table->string('start_year')->nullable();
            $table->string('impact')->nullable();
            $table->string('added')->nullable();
            $table->string('published')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('relevance')->nullable();
            $table->string('pestle')->nullable();
            $table->string('source')->nullable();
            $table->string('title')->nullable();
            $table->string('likelihood')->nullable();
            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('your_table', function (Blueprint $table) {
            $table->dropColumn(['end_year', 'topic', 'sector', 'region', 'pest', 'source', 'swot', 'country', 'city']);
        });
    }

};
