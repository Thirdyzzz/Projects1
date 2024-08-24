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
       Schema::create('recentlyAdded', function (Blueprint $table) {
                $table->bigIncrements('ra_id'); // Define 'test_id' as the primary key.
                $table->string('ra_filename');
                $table->string('ra_by_author');
                $table->timestamps(); // Created at and updated at timestamps
         });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
