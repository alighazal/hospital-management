<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function path(){
        return "/patient/" . $this->id;
    }

    public function associatedUser() {
        return $this->hasOne(User::class);
    }

}
