<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use App\Models\invoices_details;
use App\Models\invoices_attachments;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InvoicesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $invoices = invoices::where("id", $id)->first();
        $invoices_details = invoices_details::where("id_invoice", $id)->get();
        $invoices_attachments = invoices_attachments::where("invoice_id", $id)->get();
        $attach = invoices_attachments::select("file_name")->first();
        return view('invoices.invoices_details', compact('invoices', 'invoices_details', 'invoices_attachments', 'attach'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\invoices_details $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\invoices_details $invoices_details
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\invoices_details $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoices_details $invoices_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\invoices_details $invoices_details
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $invoices_attachments = invoices_attachments::findOrFail($request->id_file);
        $invoices_attachments->delete();
        Storage::disk('public_uploads')->delete($request->invoice_number . '/' . $request->file_name);
        session()->flash('Delete', 'تم حذف المرفق بنجاح');
        return back();
    }

    public function OpenFile($invoice_number, $file_name)
    {
        $file = public_path('Attachments/' . $invoice_number . '/' . $file_name);
        return response()->put($file);
    }

    public function GetFile($invoice_number, $file_name)
    {
        $file = public_path('Attachments/' . $invoice_number . '/' . $file_name);
        return response()->download($file);
    }
}
