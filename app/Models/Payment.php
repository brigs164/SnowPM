<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //Belongs to Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'CustID');
    }
    
    use HasFactory;
}
