<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pronostic extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
