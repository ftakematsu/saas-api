<?php

use App\Domain\Chat\Entities\ChatStatus;
use App\Domain\Chat\Entities\ChatType;
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
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->enum('type', array_column(ChatType::cases(), 'value'))->default(ChatType::PRIVATE->value);

            $table->string('title')->nullable();

            $table->enum('status', array_column(ChatStatus::cases(), 'value'))->default(ChatStatus::OPEN->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
};
