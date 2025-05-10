<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    /**
     * Relation avec l'utilisateur
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
    /**
     * Relation avec les commentaires
     */
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
