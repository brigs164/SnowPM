<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlPanel extends Model
{
    use HasFactory;

    public static function InvoiceGetYear(){

        $years = ControlPanel::all();
        
        foreach($years as $year){
            $year2 = $year->Year2;
            $year1 = $year->Year1;

        }

        $invoices1 = Invoice::whereYear('Date', '=', $year2)->whereMonth('Date', '<=', 6)->get();
        $invoices2 = Invoice::whereYear('Date', '=', $year1)->whereMonth('Date', '>=', 7)->get();
        
        $invoices = $invoices1->merge($invoices2);

        return $invoices;
    }

    public static function JobsGetYear(){

        $years = ControlPanel::all();
        
        foreach($years as $year){
            $year2 = $year->Year2;
            $year1 = $year->Year1;

        }

        $jobs1 = Job::whereYear('Date', '=', $year2)->whereMonth('Date', '<=', 6)->get();
        $jobs2 = Job::whereYear('Date', '=', $year1)->whereMonth('Date', '>=', 7)->get();
        
        $jobs = $jobs1->merge($jobs2);

        return $jobs;
    }
}