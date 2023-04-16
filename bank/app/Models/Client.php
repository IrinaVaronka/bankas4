<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $timestamps = false;
    const SORT = [
        'surname_asc' => 'By surname A-Z',
        'surname_desc' => 'By surname Z-A',
    ];

    const FILTER = [
        'default' => 'Show all',
        'plus' => 'Only plus accounts',
        'minus' => 'Only minus accounts',
        'zero' => 'Only zero accounts',
        'noAcc' => 'Clients who do not have accounts',
    ];

    const PER = [
        '5' => '5',
        '15' => '15',
        '40' => '40',
    ];





}
