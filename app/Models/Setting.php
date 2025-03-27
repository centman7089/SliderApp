<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    public function up()
{
    Schema::create('settings', function (Blueprint $table) {
        $table->id();
        $table->integer('slider_interval')->default(5000); // Time in milliseconds
        $table->timestamps();
    });
}

}
