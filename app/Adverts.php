<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adverts extends Model
{
    protected $fillable = [
        'name', 'description','photo','category','is_hidden'
    ];}
