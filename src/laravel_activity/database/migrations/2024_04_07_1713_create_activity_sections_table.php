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
        Schema::create('activity_sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('depth')->default(0);
            $table->text('description')->nullable();
            $table->foreignIdFor(\App\Models\ActivitySection::class)->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_sections');
    }
};
