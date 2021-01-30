<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['id','name', 'parent_id', 'status', 'children'];


    public function childS(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
