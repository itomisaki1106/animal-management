<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'item_id',
        'user_id',
    ];

    public function users() {
        return $this->belongsTo('App\Models\User');
    }

    public function items() {
        return $this->belongsTo('App\Models\Item');
    }

}
