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
        return Laundry::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create($laundry)
    {
        dd(request()->service_id->service());
        $data = request()->all();
        $laundry = new Laundry;
        $laundry->user_id = \request()->user()->id;
        $laundry->service_id = $data['service_id'];
        $laundry->address   = $data['address'];
        $laundry->amount    = request()->service()->amount;
        $laundry->cloth_no  =   $data['clotho_no'];
        $laundry->save();
        return ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function fetch($laundryId)
    {
        return Laundry::findOrFail($laundryId);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Laundry $laundry
     * @param $laundryId
     * @return void
     */
    public function update($laundry,$laundryId)
    {
        $data = request()->all();
        $laundry    =   Laundry::findOrFail($laundryId);
        $laundry->user_id = $data->user()->id;
        $laundry->service_id = $data->service_id;
        $laundry->address   = $data->address;
        $laundry->amount    = is_delivered;
        $laundry->cloth_no  =   $data->cloth_no;
        $laundry->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function destroy($laundryId)
    {
        return Laundry::findOrFail($laundryId)->delete();
    }
}
