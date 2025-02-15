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
        Schema::create('blog_cmt', function (Blueprint $table) {
            $table->id();
            $table->string('cmt');
            $table->string('id_blog');
            $table->string('id_user');
            $table->string('avatar');
            $table->string('name');
            $table->string('level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_cmt');
    }
};
