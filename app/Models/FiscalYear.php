<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FiscalYear extends Model
{
    use SoftDeletes;
    protected $dates = ['start_date','end_date'];
    protected $fillable = [
        'name','start_date','end_date'
    ];
}
