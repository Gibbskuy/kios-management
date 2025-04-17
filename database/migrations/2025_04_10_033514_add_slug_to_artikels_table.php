<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('artikels', function (Blueprint $table) {
        $table->string('slug')->unique()->after('judul');
    });
    // Schema::table('kategoris', function (Blueprint $table) {
    //     $table->string('slug')->unique()->after('nama_kategori');
    // });

}

public function down()
{
    Schema::table('artikels', function (Blueprint $table) {
        $table->dropColumn('slug');
    });
    // Schema::table('kategoris', function (Blueprint $table) {
    //     $table->dropColumn('slug');
    // });

}
};
