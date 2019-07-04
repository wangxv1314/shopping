<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //设置主键
    public $primaryKey = 'uid';
    //设置默认表
    public $table = 'users';
}
