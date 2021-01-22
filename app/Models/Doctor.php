<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path() {
        return '/doctor/' . $this->id;
    }

    public function hospitals(){
        return $this->belongsToMany(Hospital::class);
    }

    public function associatedUser() {
        return $this->hasOne(User::class);
    }
}
