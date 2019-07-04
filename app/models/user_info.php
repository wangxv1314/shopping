<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class user_info extends Model
{
    //设置主键
    public $primaryKey = 'id';
    //设置默认表
    public $table = 'user_info';
}
