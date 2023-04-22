<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    const SORT = [
        
        'surname_asc' => 'By surname A-Z',
        'surname_desc' => 'By surname Z-A',
    ];

    const FILTER = [
        'default' => 'Show all',
        'plus' => 'Only plus accounts',
        'minus' => 'Only minus accounts',
        'zero' => 'Only zero accounts'
        // 'noAcc' => 'Clients who do not have accounts',
    ];

    const PER = [
        '5' => '5',
        '15' => '15',
        '40' => '40',
    ];



    protected $fillable = ['account', 'amount', 'client_id'];

    public function accountClient() 
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
