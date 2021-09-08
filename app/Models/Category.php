<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany as HasMany;

class Category extends Model
{
    use HasFactory;
    
    protected $table = "categories";protected $primaryKey = 'id';
    protected $fillable = ['title', 'description'];
    protected $allowedFields=['id', 'title', 'description'];
    protected $guarded = [];
    /**
     * Get all of the news for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'id','category_id');
    }
}
