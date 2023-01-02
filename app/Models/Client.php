<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    //Other Functions
    public function getClientIDAttribute() {
        return str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }

    public function getPhoneNumberAttribute() {
        return "(".substr($this->Phone, 0, 3).") ".substr($this->Phone, 3, 3)."-".substr($this->Phone,6);
    }

    public function getClientActiveAttribute() {
        if($this->Status == 1){
            return "Active";
        }
        else{
            return"Inactive";
        }
    }
}
