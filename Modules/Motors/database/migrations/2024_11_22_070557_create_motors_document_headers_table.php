<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('motors_document_headers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')
                ->constrained('motors_documents')
                ->cascadeOnDelete();
            $table->string('title');
            $table->text('encrypted_header');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('motors_document_headers');
    }
};
