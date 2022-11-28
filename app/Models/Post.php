<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected  $guarded = [];

    //Relations
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class)->where('status', 'Approved');
    }
    //Scopes
    public function scopeActive($query){
        return $query->where('status', 1);
    }
    public function scopePending($query){
        return $query->where('status', 'Pending');
    }

    public function scopeApproved($query){
        return $query->where('status', 'Approved');
    }

    public function scopeRejected($query){
        return $query->where('status', 'Rejected');
    }

    public function scopePopular($query){
        return $query->where('position', 'Popular');
    }

    public function scopeTrending($query){
        return $query->where('position', 'Trending');
    }

    public function scopeFeatured($query){
        return $query->where('position', 'Featured');
    }

    public function scopeGallery($query){
        return $query->where('type', 1)->where('status', 'Approved');
    }
    public function scopeVideos($query){
        return $query->where('type', 2)->where('status', 'Approved');
    }
}
