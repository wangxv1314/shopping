<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{
    //设置主键
    public $primaryKey = 'cid';
    //设置默认表
    public $table = 'cates';
}
