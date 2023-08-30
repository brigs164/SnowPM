<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    //Has Many Details
    public function invoice_details()
    {
        return $this->hasMany(Invoice_Details::class, 'InvoiceID');
    }

    //Belongs to Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'CustID');
    }

    //Other Functions
    public function getInvoiceIDAttribute() {
        return str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }
}
