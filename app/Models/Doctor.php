<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'user_id';
    public $incrementing = false;

    public function path() {
        return '/doctor/' . $this->user_id;
    }

    public function user() {
        return $this->hasOne(User::class, "id", "user_id" );
    }

}
