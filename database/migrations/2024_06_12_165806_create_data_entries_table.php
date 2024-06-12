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
            $table->string('topic')->nullable();
            $table->string('sector')->nullable();
            $table->string('region')->nullable();
            $table->string('pest')->nullable();
            $table->string('source')->nullable();
            $table->string('swot')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('column10')->nullable();
            $table->string('column11')->nullable();
            $table->string('column12')->nullable();
            $table->string('column13')->nullable();
            $table->string('column14')->nullable();
            $table->string('column15')->nullable();
            $table->string('column16')->nullable();
            $table->string('column17')->nullable();
            $table->string('column18')->nullable();
            $table->string('column19')->nullable();
            $table->string('column20')->nullable();
            $table->string('column21')->nullable();
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
