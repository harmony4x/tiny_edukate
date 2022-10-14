<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistical extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'statistical';
    protected $fillable = [
        'registration_date', 'total_cost', 'total_user'
    ];
}
