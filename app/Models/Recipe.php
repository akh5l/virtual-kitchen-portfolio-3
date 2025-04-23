<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Recipe extends Model
{
    protected $primaryKey = 'rid';
    
    protected $fillable = [
        'uid', 'name', 'type', 'description'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'uid');
    }
}
