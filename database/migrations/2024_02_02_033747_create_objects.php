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
        Schema::create('objects', function (Blueprint $table) {
            $table->uuid("IdObject")->default(\Illuminate\Support\Str::uuid())->index();
            $table->string('ObjectName', 100);
            $table->string('ObjectLink', 255);
            $table->foreignUuid('BucketId')->constrained("buckets")->references("IdBucket");
            $table->text('ObjectLinkGcloud')->nullable();
            $table->string('Extension', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objects');
    }
};
