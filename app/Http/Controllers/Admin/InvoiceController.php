<?php

namespace App\Http\Controllers\Admin;

use App\Models\Invoice;
use App\Repositories\RepositoryInterfaces\InvoiceRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    /**
     * @var InvoiceRepositoryInterface
     */
    private $invoice;

    public function __construct(InvoiceRepositoryInterface $invoice)
    {
        $this->invoice = $invoice ;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice    =   $this->invoice->fetchAll();
        return response()->json(['data'=>$invoice]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($invoiceId)
    {
        return  $this->invoice->fetch($invoiceId);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function delete($invoiceId)
    {
        $this->invoice->delete($invoiceId);
        return response()->json(['message'=>'success']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function markPaid($invoiceId)
    {
        $this->invoice->mark
    }
}
