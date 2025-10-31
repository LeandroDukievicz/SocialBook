<?php

use App\Constants\Tables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public $withinTransaction = false;

    public function up(): void
    {
        Schema::create(Tables::USERS, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email'); // unique será adicionada separadamente
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('bio', 500)->nullable();
            $table->string('photo', 150)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(Tables::USERS);
    }
};
