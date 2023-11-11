<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $table = 'vegeproducts'; // Move this line outside of the methods

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('vegeno'); // Vegetable No.
            $table->string('name'); // Name
            $table->date('date'); // Date
            $table->integer('quant'); // Quantity
            $table->decimal('sprice', 10, 2); // Selling price
            $table->decimal('cprice', 10, 2); // Cost price
            $table->text('description')->nullable(); 
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
