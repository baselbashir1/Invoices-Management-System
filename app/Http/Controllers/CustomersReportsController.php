<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use App\Models\sections;
use Illuminate\Http\Request;

class CustomersReportsController extends Controller
{
    public function index()
    {
        $sections = sections::all();
        return view('reports.customers_reports', compact('sections'));
    }

    public function SearchCustomers(Request $request)
    {
        if ($request->section && $request->product && $request->start_at == '' && $request->end_at == '') {
            $invoices = invoices::select('*')->where('section_id', '=', $request->section)->where('product', '=', $request->product)->get();
            $sections = sections::all();
            return view('reports.customers_reports', compact('sections', 'invoices'));
        } else {
            $start_at = date($request->start_at);
            $end_at = date($request->end_at);
            $invoices = invoices::whereBetween('invoice_date', [$start_at, $end_at])->where('section_id', '=', $request->section)->where('product', '=', $request->product)->get();
            $sections = sections::all();
            return view('reports.customers_reports', compact('sections', 'invoices'));
        }
    }
}
