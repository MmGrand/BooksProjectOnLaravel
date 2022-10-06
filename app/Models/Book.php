<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $table = 'books';
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'description',
        'author_id',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genres', 'book_id', 'genre_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
