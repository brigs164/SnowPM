<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    //Has One Status
    public function job_detail()
    {
        return $this->hasOne(Job_Details::class, 'JobID');
    }

    //Belongs to Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'CustID');
    }
}
