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
        Schema::create('fee_structures', function (Blueprint $table) {
            $table->id();
            // $table->string('class');
            $table->foreignId('class_id')->constrained()->onDelete('cascade');
            $table->foreignId('fee_type_id')->constrained()->onDelete('cascade');
            // $table->string('fee_type'); // tuition, transport, library, etc.
            $table->decimal('amount', 10, 2);
            $table->foreignId('session_id')->constrained()->onDelete('cascade');
            $table->foreignId('term_id')->constrained()->onDelete('cascade');

            // $table->string('academic_year');
            // $table->string('term')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_structures');
    }
};
