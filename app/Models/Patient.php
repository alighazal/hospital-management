<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $primaryKey = 'user_id';
    public $incrementing = false;

    public function path(){
        return "/patient/". $this->user_id;
    }

    public function associatedUser() {
        return $this->hasOne(User::class, "id", "user_id" );
    }

}
