<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use Illuminate\Http\Request;

class InvoicesReportsController extends Controller
{
    public function index()
    {
        return view('reports.invoices_reports');
    }

    public function SearchInvoices(Request $request)
    {
        $radio = $request->rdio;
        if ($radio == 1) {
            if ($request->type && $request->start_at == '' && $request->end_at == '') {
                $invoices = invoices::select('*')->where('status', '=', $request->type)->get();
                $type = $request->type;
                return view('reports.invoices_reports', compact('type', 'invoices'));
            } else {
                $start_at = date($request->start_at);
                $end_at = date($request->end_at);
                $type = $request->type;
                $invoices = invoices::whereBetween('invoice_date', [$start_at, $end_at])->where('status', '=', $request->type)->get();
                return view('reports.invoices_reports', compact('type', 'start_at', 'end_at', 'invoices'));
            }
        } else {
            $invoices = invoices::select('*')->where('invoice_number', '=', $request->invoice_number)->get();
            return view('reports.invoices_reports', compact('invoices'));
        }
    }
}
