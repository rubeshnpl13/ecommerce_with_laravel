<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionProduct extends Model
{
    use HasFactory;
    protected $table='products_options';
    protected $fillable=['product_id','option_id','attribute_value'];
    protected $filltable=['product_id','option_id','attribute_value'];

}
