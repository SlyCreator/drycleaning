<?php


namespace App\Repositories\DBRepositories;

use App\Models\Service;
use App\Repositories\RepositoryInterfaces\ServiceRepositoryInterface;

class ServiceDBRepository implements ServiceRepositoryInterface
{
    /**
     * get all service
     *
     * @return mixed
     */
    public function fetchAll()
    {
        return Service::all();
    }

    /**
     * create a service
     *
     * @param $service
     * @return mixed
     */
    public function create($service)
    {
        dd($service);
        return Service::create();
    }

    /**
     * get a service
     *
     * @param $serviceId
     * @return mixed
     */
    public function show($serviceId)
    {
        return Service::findOrFail($serviceId)->first();
    }

    /**
     * update a service
     *
     * @param $service
     * @param $serviceId
     * @return mixed
     */
    public function update($service ,$serviceId)
    {
        $service = Service::findOrFail($serviceId);
        return $service->update([
            'name'  =>  $service->name,
            'description' => $service->description,
            'amount'   => $service->amount
        ]);
    }

    /**
     * delete a service
     *
     * @param $serviceId
     * @return mixed
     */
    public function delete($serviceId)
    {
        return Service::findOrFail($serviceId)->delete();
    }
}
