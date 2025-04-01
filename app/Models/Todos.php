<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'completed',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
