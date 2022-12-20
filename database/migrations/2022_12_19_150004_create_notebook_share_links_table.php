<?php

use App\Models\Notebook;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notebook_share_links', function (Blueprint $table) {
            $table->id();
            $table->string('hashid')->nullable();
            $table->boolean('hide_notebook_name');
            $table->foreignIdFor(Notebook::class)->constrained()->onDelete('cascade');
            $table->json('page_data')->nullable();
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
        Schema::dropIfExists('notebook_share_links');
    }
};
