<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //设置默认表
    public $table = 'banners';
    //设置默认主键
    public $primaryKey = 'bid';
}
