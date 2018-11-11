<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];
    protected $casts = [
        'dep_input_percentage' => 'float',
        'ca_initial_allowance_percentage' => 'float',
        'ca_annual_allowance_percentage' => 'float',
        'ca_investment_allowance_percentage' => 'float'
    ];
}
