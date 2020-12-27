<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('custom_id')->unique();

            $table->string('name');
            $table->string('company_name')->nullable();
            $table->date('conversion_date');
            $table->string('contact_number')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('comment_1')->nullable();
            $table->string('comment_2')->nullable();

            $table->integer('source_id')->unsigned();
            $table->foreign('source_id')->references('id')->on('sources')->onDelete('cascade');

            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('persons')->onDelete('cascade');

            $table->integer('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

            $table->integer('lead_status_id')->unsigned();
            $table->foreign('lead_status_id')->references('id')->on('lead_statuses')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
