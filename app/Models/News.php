<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo as BelongsTo;

class News extends Model
{
    use HasFactory;
    protected $table = "news";

    protected $fillable = ['title', 'description', 'author', 'image', 'status', 'category_id'];
    protected $allowedFields = ['id', 'title', 'description', 'author', 'image', 'status', 'category_id'];
    /**
     * Get the category that owns the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
