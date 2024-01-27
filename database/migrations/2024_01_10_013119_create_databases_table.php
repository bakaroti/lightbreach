<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabasesTable extends Migration
{
    public function up()
    {
        Schema::create('databases', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('file_path'); // Assuming this is where you store the file path
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('databases');
    }
}