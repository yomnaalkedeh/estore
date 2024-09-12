<?php

use App\Models\Admin\Admin;
use App\Models\Admin\Category;
use App\Models\Admin\Vendor;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('desc');
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
          //  $table->foreignIdFor(Admin::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
         //   $table->foreignIdFor(Vendor::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->double('price');
            $table->text('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
