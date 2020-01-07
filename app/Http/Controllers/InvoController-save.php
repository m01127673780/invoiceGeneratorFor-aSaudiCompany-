<?php

namespace App\Http\Controllers;

use App\Invo;
use Illuminate\Http\Request;
use PDF;



class InvoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invo.invo');

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

    public function downloadPDF()

    {

        $pdf = PDF::loadView('pdfView');

       return $pdf->download('invoice.pdf');
        //return 'mohmed';

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save_date = new  Invo();
        $save_date->invoice_tax                      =request('invoice_tax');
        $save_date->invoice_currency                 =request('invoice_currency');
        $save_date->invoice_discount                 =request('invoice_discount');
        $save_date->invoice_name             =request('invoice_name');
        $save_date->invoice_billing_date     =request('invoice_billing_date');
        $save_date->invoice_due_date         =request('invoice_due_date');
        $save_date->invoice_img                      =request('invoice_img');
        $save_date->billfrom_business_name   =request('billfrom_business_name');
        $save_date->billfrom_addres_line_one =request('billfrom_addres_line_one');
        $save_date->billfrom_addres_line_tow =request('billfrom_addres_line_tow');
        $save_date->billfrom_phone           =request('billfrom_phone');
        $save_date->billfrom_email           =request('billfrom_email');
        $save_date->billfrom_additional_info =request('billfrom_additional_info');
        $save_date->billto_business_name     =request('billto_business_name');
        $save_date->billto_addres_line_one   =request('billto_addres_line_one');
        $save_date->billto_addres_line_tow   =request('billto_addres_line_tow');
        $save_date->billto_phone             =request('billto_phone');
        $save_date->billto_email             =request('billto_email');
        $save_date->billto_additional_info   =request('billto_additional_info');
        $save_date->invoice_extra_notes      =request('invoice_extra_notes');
        $save_date->invoice_extra_notes      =request('invoice_extra_notes');
        $save_date->invoice_use_the_space    =request('invoice_use_the_space');
        $save_date->invoice_select_acolor    =request('invoice_select_acolor');
        $save_date->invoice_label_stamp      =request('invoice_label_stamp');
        $save_date->invoice_signature        =request('invoice_signature');
        $save_date->invoice_designation      =request('invoice_designation');
        //return dd($save_date);
        return dd($save_date->invoice_img);
       // return dd(request()->hasFile('invoice_img'));

       $save_date->save();
       return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invo  $invo
     * @return \Illuminate\Http\Response
     */
    public function show(Invo $invo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invo  $invo
     * @return \Illuminate\Http\Response
     */
    public function edit(Invo $invo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invo  $invo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invo $invo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invo  $invo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invo $invo)
    {
        //
    }
}
