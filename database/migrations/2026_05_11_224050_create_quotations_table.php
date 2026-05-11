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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('quotation_number')->unique(); // COT-2026-0001
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('user_id')->constrained(); // vendedor que creó la cotización
            $table->date('issue_date'); // fecha de emisión
            $table->date('expiration_date'); // fecha de vencimiento (issue_date + 15 días)
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('tax', 12, 2)->default(0);
            $table->decimal('total', 12, 2)->default(0);
            $table->enum('status', ['pendiente', 'aprobada', 'rechazada', 'vencida'])->default('pendiente');
            $table->text('observations')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
