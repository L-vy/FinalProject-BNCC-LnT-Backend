<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'author', 'description', 'price',
        'cover_image', 'stock', 'category_id',
        'publisher', 'number_of_page'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
