<?php

namespace App\Models;

use Clockwork\Storage\Search;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $with = ['author','category'];

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['search']??null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('body', 'LIKE', '%' . $search . '%');
            });
        });

        $query->when($filter['category']??null, function ($query, $category) {
            $query->where(function ($query) use ($category) {
                $query->whereHas('category', function ($query) use ($category) {
                    $query->where('slug', $category);
                });
            });
        });

        $query->when($filter['author']??null, function ($query, $author) {
            $query->where(function ($query) use ($author) {
                $query->whereHas('author', function ($query) use ($author) {
                    $query->where('username', $author);
                });
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
