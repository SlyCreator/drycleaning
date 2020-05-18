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
        $service = request()->all();
        return Service::create($service);
    }

    /**
     * get a service
     *
     * @param $serviceId
     * @return mixed
     */
    public function fetch($serviceId)
    {
        return Service::findOrFail($serviceId);
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
        $service =Service::findOrFail($serviceId);
        return $service->update(request()->all());
    }

    /**
     * delete a service
     *
     * @param $serviceId
     * @return mixed
     */
    public function delete($serviceId)
    {
        return  Service::findOrFail($serviceId)->delete();

    }
}
