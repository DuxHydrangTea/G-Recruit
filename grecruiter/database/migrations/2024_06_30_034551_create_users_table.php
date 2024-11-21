<?php

use App\Models\Esport;
use App\Models\Position;
use App\Models\Positions;
use App\Models\Rank;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('name');
            $table->string('password');
            $table->string('phone', 10)->nullable();
            $table->string('address', 250)->nullable();
            $table->string('avatar', 500)->default("");
            $table->date('birthday')->nullable();
            // forein key
            $table->foreignIdFor(Esport::class)->default(0);
            $table->string('nickname', 100)->unique();
            // forein key
            $table->foreignIdFor(Rank::class)->default(0);
            $table->bigInteger('rank_points')->nullable()->default(0);

            $table->foreignIdFor(Position::class)->constrained();

            $table->text('advantage_1')->nullable();
            $table->text('advantage_2')->nullable();
            $table->text('advantage_3')->nullable();
            $table->boolean('is_admin')->nullable()->default(false);
            $table->softDeletes();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};