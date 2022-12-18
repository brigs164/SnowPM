<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Details extends Model
{
    use HasFactory;

    protected $table = 'job_details';

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'ProductID');
    }
}
