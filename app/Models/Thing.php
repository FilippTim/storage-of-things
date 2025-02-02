<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'wrnt',
        'master',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'master');
    }
}
