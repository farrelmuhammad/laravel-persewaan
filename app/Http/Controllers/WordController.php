<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PDF;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = $request->get('company');
        $client = $request->get('client');
        $pembayaran = $request->get('pembayaran');
        
        $PdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($PdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
        $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('perjanjian.docx'));
        $template->setValue('company_name',$company);
        $template->setValue('client_name',$client);
        $template->setValue('pembayaran',$pembayaran);
        $path = storage_path('generated.docx');
        $template->saveAs($path);
        $temp = \PhpOffice\PhpWord\IOFactory::load($path);
        $pdf = \PhpOffice\PhpWord\IOFactory::createWriter($temp,'HTML');
        $pdf->save(storage_path('generated.html'),TRUE);
        return PDF::loadFile(storage_path('generated.html'))->save(storage_path('generated.pdf'))->stream('generated.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
