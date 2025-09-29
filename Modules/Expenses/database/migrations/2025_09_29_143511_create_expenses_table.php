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
        Schema::create('expenses', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID instead of bigIncrements
            $table->string('title');
            $table->decimal('amount', 12, 2);
            $table->string('category'); // you can later replace this with enum
//            $table->enum('category', [
//                'food_and_drink',
//                'transportation',
//                'office_supplies',
//                'utilities',
//                'rent',
//                'salary',
//                'entertainment',
//                'healthcare',
//                'misc'
//            ]);
            $table->dateTime('expense_date');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
