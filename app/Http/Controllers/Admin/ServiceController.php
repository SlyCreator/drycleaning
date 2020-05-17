<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\RepositoryInterfaces\ServiceRepositoryInterface;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function __construct(ServiceRepositoryInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {http://127.0.0.1:8000/api/v1/service
        $data = $this->service->index();
        dd($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Service $service
     * @return void
     */
    public function create(Request $request)
    {
        //dd($request->all());
        $service = $this->service->create($request->all());
        dd($service);
        return $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Service $service
     * @return void
     */
    public function show(Request $request,Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
