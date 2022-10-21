<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    //Belongs to Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'CustID');
    }
}
