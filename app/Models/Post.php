<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id',
    ];

    // un usuario puede tener muchos post
    public function user(){
        return $this->belongsTo(User::class)->select(['id', 'name', 'userName']);
    }
    
    // un post puede tener muchos comentarios
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // un post puede tener muchos likes
    public function likes(){
        return $this->hasMany(Like::class);
    }

    // verifica si el post ya tiene like por el usuario
    public function checkLikes(User $user){
        return $this->likes->contains('user_id', $user->id);
    }
}
