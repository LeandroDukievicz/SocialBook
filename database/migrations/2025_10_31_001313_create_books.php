<?php

use App\Constants\Tables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(Tables::BOOKS, function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('cover')->nullable()->index(); // Index em vez de unique()
            $table->text('description')->nullable();

            // Relacionamentos
            $table->foreignId('category_id')
                  ->constrained(Tables::CATEGORIES)
                  ->cascadeOnDelete();

            $table->foreignId('user_id')
                  ->constrained(Tables::USERS)
                  ->cascadeOnDelete();

            // Campos adicionais
            $table->boolean('complete')->default(false);
            $table->boolean('favorite')->default(false);
            $table->tinyInteger('stars')->unsigned()->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(Tables::BOOKS);
    }
};
