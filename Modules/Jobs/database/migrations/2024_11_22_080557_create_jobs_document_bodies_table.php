<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('jobs_document_bodies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')
                ->constrained('jobs_documents')
                ->cascadeOnDelete();;
            $table->text('encrypted_body');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs_document_bodies');
    }
};
