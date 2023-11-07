<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany,BelongsTo};

class Chapter extends Model
{
    use HasFactory;
    protected $table = 'chapter';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'chapter_number',
        'chapter_name',
        'chapter_slug',
        'chapter_content',
        'chapter_status',
        'book_id',
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;
    public function book(): BelongsTo{
        return $this->belongsTo(Book::class,'book_id','id');
    }
}
