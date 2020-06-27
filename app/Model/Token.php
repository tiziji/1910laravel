<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    public $table="p_tokens";
    protected $primaryKey="id";
    public $timestamps = false;
}
