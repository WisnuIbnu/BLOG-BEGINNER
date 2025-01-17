<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTags extends Model
{
    use HasFactory;

    protected $table = 'article_tags';
    protected $fillable = [
        'article_id','tag_id'
    ];
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class); // Pastikan nama model `Tag` benar
    }

    public function article()
    {
        return $this->belongsTo(Article::class); // Pastikan nama model `Tag` benar
    }
}
