<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Terminal extends Model
{

    protected $table = 'acceptor';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;
}
