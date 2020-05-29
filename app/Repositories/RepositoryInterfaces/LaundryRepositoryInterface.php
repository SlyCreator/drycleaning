<?php


namespace App\Repositories\RepositoryInterfaces;



interface LaundryRepositoryInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchAll();

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create($laundry);

    /**
     * Display the specified resource.
     *
     * @param \App\Laundry $laundry
     * @return \Illuminate\Http\Response
     */
    public function fetch($laundry);

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Laundry $laundry
     * @param $laundryId
     * @return \Illuminate\Http\Response
     */
    public function update($laundry ,$laundryId);

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Laundry $laundry
     * @return \Illuminate\Http\Response
     */
    public function destroy($laundry);

    /**
     * Update the specified resource in storage.
     *
     * mark as delivered
     * @param $laundryId
     * @return \Illuminate\Http\Response
     */
    public function isDelivered($laundryId);

}


