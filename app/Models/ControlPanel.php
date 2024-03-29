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

    public static function ProductsGetYear(){

        $years = ControlPanel::all();
        
        foreach($years as $year){
            $year2 = $year->Year2;
            $year1 = $year->Year1;

        }

        $product1 = Product::whereYear('Date', '=', $year2)->whereMonth('Date', '<=', 6)->get();
        $product2 = Product::whereYear('Date', '=', $year1)->whereMonth('Date', '>=', 7)->get();
        
        $products = $product1->merge($product2);

        return $products;
    }

    public static function ExpensesGetYear(){

        $years = ControlPanel::all();
        
        foreach($years as $year){
            $year2 = $year->Year2;
            $year1 = $year->Year1;

        }

        $expense1 = Expense::whereYear('Date', '=', $year2)->whereMonth('Date', '<=', 6)->get();
        $expense2 = Expense::whereYear('Date', '=', $year1)->whereMonth('Date', '>=', 7)->get();
        
        $expenses = $expense1->merge($expense2);

        return $expenses;
    }

    public static function PaymentsGetYear(){

        $years = ControlPanel::all();
        
        foreach($years as $year){
            $year2 = $year->Year2;
            $year1 = $year->Year1;

        }

        $payments1 = Payment::whereYear('Date', '=', $year2)->whereMonth('Date', '<=', 6)->get();
        $payments2 = Payment::whereYear('Date', '=', $year1)->whereMonth('Date', '>=', 7)->get();
        
        $payments = $payments1->merge($payments2);

        return $payments;
    }
}