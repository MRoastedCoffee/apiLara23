<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->unsignedInteger('numero')->nullable()->after('id');
            $table->unique('numero');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('numero')->nullable()->after('id');
            $table->unique('numero');
        });

        DB::table('categories')
            ->whereNull('numero')
            ->orderBy('id')
            ->select('id')
            ->get()
            ->each(function ($category): void {
                DB::table('categories')
                    ->where('id', $category->id)
                    ->update(['numero' => $category->id]);
            });

        DB::table('products')
            ->whereNull('numero')
            ->orderBy('id')
            ->select('id')
            ->get()
            ->each(function ($product): void {
                DB::table('products')
                    ->where('id', $product->id)
                    ->update(['numero' => $product->id]);
            });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropUnique('products_numero_unique');
            $table->dropColumn('numero');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropUnique('categories_numero_unique');
            $table->dropColumn('numero');
        });
    }
};
