<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'book';
    protected $fillable = [
        'category_id',
        'book_name',
        'book_slug',
        'book_summary',
        'book_image',
        'book_status',
        'created_by',
    ];
}
