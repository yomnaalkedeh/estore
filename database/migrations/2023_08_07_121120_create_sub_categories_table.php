<?php

use App\Models\Admin\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Category::class, 'subcategory_id')->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unique(['category_id','subcategory_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
