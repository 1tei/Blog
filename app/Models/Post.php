<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'slug', 'excerpt', 'body'];

    //Defined in AppServiceProvider
    //protected $guarded = [];

    protected $with  = ['category', 'author'];

    public function scopefilter($query, array $filters){ //Post::newQuery()->filter()
        //ANOTHER METHOD
        //$query->where

/*        if ($filters['category'] ?? false) {
            $query
                ->where('slug', request('category'));
        }*/

        $query->when($filters['search'] ?? false, function ($query) {
            $query->where(function($query) {
                $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
            });
        });

        $query->when($filters['category'] ?? false, function ($query) {
             $query->whereHas('category', function($query) {
                 $query
                   ->where('slug', request('category'));
            });
        });

        $query->when($filters['author'] ?? false, function ($query) {
            $query->whereHas('author', function($query) {
                $query
                    ->where('username', request('author'));
            });
        });

    }

    public function category()
    { //eloquent relationship
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author() //author_id must overwrite
    {
        return $this->belongsTo(User::class, 'user_id'); //if the function is named differently than the field itself
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
