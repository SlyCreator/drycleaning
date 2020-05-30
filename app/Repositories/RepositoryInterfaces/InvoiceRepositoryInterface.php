<?php


namespace App\Repositories\RepositoryInterfaces;


interface InvoiceRepositoryInterface
{
    /**
     * get all invoice
     *
     * @return mixed
     */
    public function fetchAll();

    /**
     * create a invoice
     *
     * @param $invoice
     * @return mixed
     */
    public function create($invoice);

    /**
     * get a invoice
     *
     * @param int $invoiceId
     * @return mixed
     */
    public function fetch(int $invoiceId);

    /**
     * update a invoice
     *
     * @param $invoice
     * @param $invoiceId
     * @return mixed
     */
    public function update($invoice ,$invoiceId);

    /**
     * delete a invoice
     *
     * @param $invoiceId
     * @return mixed
     */
    public function delete($invoiceId);

    /**
     * mark an invoice as paid
     *
     * @param $invoiceId
     * @return mixed
     */
    public function markPaid($invoiceId);
}
