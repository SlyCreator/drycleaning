<?php


namespace App\Repositories\DBRepositories;


use App\Models\Invoice;
use App\Repositories\RepositoryInterfaces\InvoiceRepositoryInterface;

class InvoiceDBRepository implements InvoiceRepositoryInterface
{

    /**
     * get all invoice
     *
     * @return mixed
     */
    public function fetchAll()
    {
        return Invoice::all();
    }

    /**
     * create a invoice
     *
     * @param $invoice
     * @return mixed
     */
    public function create($invoice)
    {
        $data = response()->all();
        $invoice = new Invoice;
        $invoice->ref_code = '23';
        $invoice->laundry_id = $data['laundry_id'];
        $invoice->staff_id  =  \request()->user()->id;
        $invoice->save();
    }

    /**
     * get a invoice
     *
     * @param int $invoiceId
     * @return mixed
     */
    public function fetch(int $invoiceId)
    {
       return Invoice::findOrFail($invoiceId);
    }

    /**
     * update a invoice
     *
     * @param $invoice
     * @param $invoiceId
     * @return mixed
     */
    public function update($invoice, $invoiceId)
    {
        $data = response()->all();
        $invoice = Invoice::findOrFail($invoiceId);
        $invoice->ref_code = '23';
        $invoice->laundry_id = $data['laundry_id'];
        $invoice->staff_id  =  \request()->user()->id;
        $invoice->save();
    }

    /**
     * delete a invoice
     *
     * @param $invoiceId
     * @return mixed
     */
    public function delete($invoiceId)
    {
        return Invoice::findOfFail($invoiceId)->delete();
    }
    /**
     * Mark as paid
     * @param $laundryId
     * @return \Illuminate\Http\Response
     */
    public function markPaid($invoiceId)
    {
        return  Invoice::findOrFail($invoiceId)->update(['is_paid'=>true]);
    }

}
