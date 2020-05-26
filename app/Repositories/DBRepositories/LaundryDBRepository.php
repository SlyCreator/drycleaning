<?php


namespace App\Repositories\DBRepositories;


use App\Repositories\RepositoryInterfaces\LaundryRepositoryInterface;
use App\Models\Laundry;

class LaundryDBRepository implements LaundryRepositoryInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchAll()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($laundry)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function fetch($laundry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function update($laundry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function destroy($laundry)
    {
        //
    }
}
