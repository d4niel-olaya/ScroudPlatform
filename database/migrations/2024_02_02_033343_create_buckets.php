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
        Schema::create('buckets', function (Blueprint $table) {
            $table->uuid("IdBucket")->default(\Illuminate\Support\Str::uuid())->index();
            $table->foreignUuid('UserId')->constrained("users");
            $table->string('NameAlias', 100);
            $table->string('NameGcloud', 250);
            $table->text('ApiKey')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buckets');
    }
};
