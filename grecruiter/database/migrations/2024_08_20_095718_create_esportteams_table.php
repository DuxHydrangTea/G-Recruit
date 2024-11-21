<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('esportteams', function (Blueprint $table) {
            $table->id();
            $table->string("name", 255);
            $table->string("avatar", 255);
            $table->unsignedBigInteger("esport_id");
            $table->foreign("esport_id")->references("id")->on("esports");
            $table->string("description");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esportteams');
    }
};