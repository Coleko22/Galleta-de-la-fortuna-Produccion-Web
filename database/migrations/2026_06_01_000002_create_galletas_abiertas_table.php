<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galletas_abiertas', function (Blueprint $table) {
            $table->id();
        
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
          
            $table->foreignId('mensaje_id')->nullable()->constrained('mensajes')->nullOnDelete();
        
            $table->text('mensaje');
         
            $table->timestamp('abierta_en');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galletas_abiertas');
    }
};
