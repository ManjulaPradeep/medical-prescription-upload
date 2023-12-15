<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'delivery_time',
        'Address',
        'note',
        'img1',
        'img2',
        'img3',
        'img4',
        'img5',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
