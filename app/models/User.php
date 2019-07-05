<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //设置 表名
    public $table = 'users';
    //设置默认主键
    public $primaryKey = 'uid';

}
