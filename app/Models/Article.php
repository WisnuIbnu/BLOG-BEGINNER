<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $fillable = [
        'title', 'full_text', 'image', 'category_id','view','status','publish_date','slug','user_id'
    ];

    //relasi ke kateg
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function articleTags()
    {
        return $this->hasMany(ArticleTags::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}


}
