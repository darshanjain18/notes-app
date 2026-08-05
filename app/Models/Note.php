<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Note extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','description','attachment','user_id','slug'];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessors

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::parse($value)->format('d M Y, h:i A'),
    );
    }
    // Mutators

    protected function title(): Attribute
    {
        return Attribute::make(
            set: fn ($title) => ucwords(strtolower($title))
    );
    }

    // Query Scopes

   public function scopeSearch($query, $search)
    {
        return $query->where(function($query) use ($search){

            $query->where('title','like',"%{$search}%")
                ->orWhere('description','like',"%{$search}%");
        });
    }
    public function scopeByAuthor($query, $author)
    {
        return $query->whereHas('user', function ($query) use ($author) {
            $query->where('name', 'like', "%{$author}%");
        });
    }
}
