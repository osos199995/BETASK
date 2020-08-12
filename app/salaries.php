<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salaries extends Model
{
    protected $fillable = ['name','team','salary','bonous','month'];
}
