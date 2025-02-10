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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->integer('surface');
            $table->integer('rooms');
            $table->integer('bedrooms');
            $table->integer('floor');
            $table->integer('baths'); // Ajout du nombre de chambre
            $table->string('address');
            $table->string('postal_code');
            $table->string('city');
            $table->float('price', 12, 2);
            $table->boolean('sold');
            $table->string('property_type'); // Ajout du type d'immobilier
            $table->decimal('latitude', 10, 7); // Ajout de la latitude
            $table->decimal('longitude', 10, 7); // Ajout de la longitude
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
