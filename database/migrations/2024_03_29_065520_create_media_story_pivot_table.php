<?php

use App\Models\Media;
use App\Models\Story;
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
        Schema::create('media_story', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Media::class)->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignIdFor(Story::class)->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_story');
    }
};
