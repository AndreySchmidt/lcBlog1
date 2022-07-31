<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;

use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    protected $guarded = false;
    protected $withCount = ['likedUsers']; // liked_users_count появится в выдаче
    protected $with = ['category']; // это метод ниже, посты в итоге будут сразу приходить с категориями

    public function tags(){
        // надо указать таблицу пивот 'post_tags' и внешний ключ 'post_tags', это столбец с которым отношение у поста 'tag_id'
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // получить лайки у постов
    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
