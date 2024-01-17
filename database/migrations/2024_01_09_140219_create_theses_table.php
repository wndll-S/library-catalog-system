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
        Schema::create('theses', function (Blueprint $table) {
            $table->id('call_number');
            $table->string('author');
            $table->string('title');
            $table->year('publication_year');
            $table->foreignId('subject_id')
                  ->constrained(table: 'subject')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->enum('availability_status', ['On-hold', 'Borrowed', 'Available'])
                  ->default('On-hold');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theses');
    }
};
