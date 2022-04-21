<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $guarded = [];

    //protected $fillable = ['name','from_date','to_date','total_budget','daily_budget','banner', 'created_at', 'updated_at'];
}
