<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;


    const SORT = [
        
        'surname_asc' => 'By surname A-Z',
        'surname_desc' => 'By surname Z-A',
    ];

    public $timestamps = false;
    

    public function account()
    {
        return $this->hasMany(Account::class);
    }

}
