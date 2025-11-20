<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('title'); // title column
            $table->text('content'); // content column
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // links post to user
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
