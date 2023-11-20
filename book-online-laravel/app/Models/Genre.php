<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class Genre extends Model
{
    use HasFactory;
    protected $table = 'genre';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'genre_name',
        'genre_slug',
        'genre_description',
        'genre_status',
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;
    
    public function book(): belongsToMany{
        return $this->belongsToMany(Book::class);
    }
}
