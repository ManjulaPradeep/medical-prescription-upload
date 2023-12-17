<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quatation extends Model
{
    use HasFactory;
    protected $fillable = [
        'drug',
        'quantity',
        'amount',
        'sub_total',
        'total',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
