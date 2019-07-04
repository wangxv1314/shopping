<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //设置主键
    public $primaryKey = 'oid';
    //设置默认表
    public $table = 'orders';
}
