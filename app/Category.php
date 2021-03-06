<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @method static where(string $string, mixed $category)
 * @method static firstWhere(string $string, mixed $category)
 * @method static create(array $array)
 */
class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
}
