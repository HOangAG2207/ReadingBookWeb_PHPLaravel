<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'author';
    protected $fillable = [
        'author_name',
        'author_slug',
        'author_gender',
        'author_overview',
        'author_image',
        'author_status',
        'created_by',
    ];
    // public function Book()
    // {
    //     return $this->hasMany(book::class, 'category_id', 'id');
    // }
}
