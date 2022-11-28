<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function scopePending($query){
        return $query->where('status', 'Pending');
    }

    public function scopeApproved($query){
        return $query->where('status', 'Approved');
    }

    public function scopeRunning($query){
        return $query->where('status', 'Running');
    }
    public function scopeClosed($query){
        return $query->where('status', 'Closed');
    }

}
