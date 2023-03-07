<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'publication_date', 'description', 'genre', 'cover_image', 'ISBN', 'price', 'editor', 'author_id'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
