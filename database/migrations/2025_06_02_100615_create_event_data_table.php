<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Creates a database table 

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('event_data', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->date('date'); //date
            $table->text('description'); //text
            $table->string('location');
            $table->string('type');
            $table->decimal('price', 8, 2); //two decimals max, 8 numbers max in total
            $table->string('image');
             $table->text('long_description');
        });
    }

    // Set columns and types 


    public function down(): void
    {
        Schema::dropIfExists('event_data');
    }
};


// remember to run php artisan migrate 