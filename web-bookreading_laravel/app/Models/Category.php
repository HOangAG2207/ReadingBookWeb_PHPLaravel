<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $fillable = [
        'category_name',
        'category_slug',
        'category_description',
        'category_image',
        'category_status',
        'created_by',
    ];
    // public function Book()
    // {
    //     return $this->hasMany(book::class, 'category_id', 'id');
    // }
}
