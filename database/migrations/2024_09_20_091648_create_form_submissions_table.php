<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormSubmissionsTable extends Migration
{
    public function up()
    {
        Schema::create('form_submissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id'); // To link to the original form
            $table->json('data'); // Store form data as JSON
            $table->timestamps();

            // Foreign key to link with the forms table if needed
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('form_submissions');
    }
}
