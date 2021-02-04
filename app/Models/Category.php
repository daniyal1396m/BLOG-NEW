<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

//    protected $fillable = ['id', 'name', 'parent_id', 'status','updated_at'];
//    protected $fillable = ['id','name','parent_id'];
    protected $guarded = [];

    public function subcategories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
