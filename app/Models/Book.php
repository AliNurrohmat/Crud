<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'year',
        'publisher',
        'city',
        'cover',
        'bookshelf_id'
    ]

    // relasi many to one dengan model Bookshelf
    // banyak buku berada di 1 rak
    // belongsTo -> inverse dari hasMany
    public function bookshelf() : BelongsTo
    {
        return $this->belongsTo(Bookshelf::class, 'bookshelf_id', 'id');
    }
}
