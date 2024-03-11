<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockBreaker extends Model
{
    use HasFactory;
    
    protected $table = 'block_breaker';

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'point' => 'required',
    );
}
