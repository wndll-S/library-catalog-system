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
        Schema::create('periodicals', function (Blueprint $table) {
            $table->string('accession_number');
            $table->string('title');
            $table->integer('volume_number');
            $table->string('issue_number', 3);
            $table->date('period_covered');
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
        Schema::dropIfExists('periodicals');
    }
};
