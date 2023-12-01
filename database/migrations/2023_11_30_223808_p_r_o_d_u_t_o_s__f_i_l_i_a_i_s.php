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
        Schema::create('produtosfiliais', function (Blueprint $table) {
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda', 10, 2);
            $table->integer('estoq_min');
            $table->integer('estoq_max');
            $table->timestamps();
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeign(['filial_id']); 
        $table->dropColumn('filial_id');
        $table->dropForeign(['produto_id']); 
        $table->dropColumn('produto_id');
        Schema::dropIfExists('produtosfiliais');
    }
};
