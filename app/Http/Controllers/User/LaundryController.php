<?php

namespace App\Http\Controllers\User;

use App\Laundry;
use App\Http\Controllers\Controller;
use App\Repositories\RepositoryInterfaces\LaundryRepositoryInterface;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    /**
     * @var LaundryRepositoryInterface
     */
    private $laundry;

    /**
     * LaundryController constructor.
     * @param LaundryRepositoryInterface $laundry
     */
    public function __construct(LaundryRepositoryInterface $laundry)
    {
        $this->laundry =   $laundry;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laundry    =   $this->laundry->fetchAll();
        return response()->json(['data'=>$laundry]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Laundry $laundry)
    {
        $laundry = $this->laundry->create($laundry->all());
        return response()->json(['message'=>'succcess']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function show($laundryId)
    {
        return $this->laundry->fetch($laundryId);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function update(Laundry $laundry,$laundryId)
    {
        $this->laundry->update($laundry,$laundryId);
        return response()->json(['message'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function destroy($laundryId)
    {
        $this->laundry->destroy($laundryId);
        return response()->json(['message'=>'success']);
    }
}
