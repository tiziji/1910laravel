<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table="p_users";
    protected $primaryKey="user_id";
    public $timestamps = false;
}
