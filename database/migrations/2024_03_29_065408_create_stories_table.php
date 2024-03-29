<?php

use App\Models\User;
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
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->integer('cover_id')->unsigned();
            $table->foreign('cover_id')->references('id')->on('media');
            $table->integer('bgm_id')->unsigned();
            $table->foreign('bgm_id')->references('id')->on('media');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
