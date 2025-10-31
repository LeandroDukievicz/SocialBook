// Substitua o código no arquivo 2025_10_30_200838_create_categories_table.php:

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// Remova a importação "use App\Constants\Tables;" se necessário

return new class extends Migration
{
    public function up(): void
    {
        // Alterado de Tables::CATEGORIES para 'categories'
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Altere este também se o up() for alterado
        Schema::dropIfExists('categories');
    }
};
