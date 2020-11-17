<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pay extends Model
{

    protected $table = 'pays';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;
}
