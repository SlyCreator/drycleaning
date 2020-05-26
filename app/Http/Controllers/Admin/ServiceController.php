<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\RepositoryInterfaces\ServiceRepositoryInterface;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * @var ServiceRepositoryInterface
     */
    private $service;

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
    {
        $data = $this->service->fetchAll();
        return response()->json(['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Service $service
     * @return void
     */
    public function create(Service $service)
    {
        $service = $this->service->create($service->all());
        return response()->json(['message'=>'success']);
    }
    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Service $service
     * @return void
     */
    public function show($serviceId)
    {
      return $this->service->fetch($serviceId);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Service $service,$serviceId)
    {
         $this->service->update($service,$serviceId);
        return response()->json(['message'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($serviceId)
    {

        $this->service->delete($serviceId);
        return response()->json(['message'=>'success']);
    }
}
