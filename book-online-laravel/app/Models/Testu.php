<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testu extends Model
{
    use HasFactory;
    protected $table = 'testu';
    protected $fillable = [
        'name',
        'genre_status',
    ];
    public $timestamps = false;
}
