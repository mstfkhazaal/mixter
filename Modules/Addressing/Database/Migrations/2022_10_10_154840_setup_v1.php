<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Lvltype
        Schema::create('add_lvltype', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });
        // Countries
        Schema::create('add_countries', function (Blueprint $table) {
            $table->id();
            $table->string('code', 2)->unique();
            $table->string('name', 100)->unique();
            $table->char('phone_code', 4)->nullable();
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });
        // First Level
        Schema::create('add_lvl1', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country')->index();
            $table->unsignedBigInteger('type')->index();
            //Constrant Foreing Key
            $table->foreign('type')->references('id')
                ->on('add_lvltype')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('country')->references('id')
                ->on('add_countries')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('code', 25)->unique();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });
        // Second Level
        Schema::create('add_lvl2', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lvl1')->index();
            $table->unsignedBigInteger('type')->index();
            //Constrant Foreing Key
            $table->foreign('type')->references('id')
                ->on('add_lvltype')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('lvl1')->references('id')
                ->on('add_lvl1')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('code', 25)->unique();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });
        // Third Level
        Schema::create('add_lvl3', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lvl2')->index();
            $table->unsignedBigInteger('type')->index();
            //Constrant Foreing Key
            $table->foreign('type')->references('id')
                ->on('add_lvltype')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('lvl2')->references('id')
                ->on('add_lvl2')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('code', 25)->unique();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });
        // Fourth Level
        Schema::create('add_lvl4', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lvl3')->index();
            $table->unsignedBigInteger('type')->index();
            //Constrant Foreing Key
            $table->foreign('type')->references('id')
                ->on('add_lvltype')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('lvl3')->references('id')
                ->on('add_lvl3')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('code', 25)->unique();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });
        // Zone
        Schema::create('add_zone', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('countries')->index();
            $table->unsignedBigInteger('lvl1')->index();
            $table->unsignedBigInteger('lvl2')->index();
            $table->unsignedBigInteger('lvl3')->index();
            $table->unsignedBigInteger('lvl4')->index();
            $table->unsignedBigInteger('type')->index();
            //Constrant Foreing Key
            $table->foreign('countries')->references('id')
                ->on('add_countries')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('lvl1')->references('id')
                ->on('add_lvl1')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('lvl2')->references('id')
                ->on('add_lvl2')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('lvl3')->references('id')
                ->on('add_lvl3')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('lvl4')->references('id')
                ->on('add_lvl4')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('type')->references('id')
                ->on('add_lvltype')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('code', 25)->unique();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
