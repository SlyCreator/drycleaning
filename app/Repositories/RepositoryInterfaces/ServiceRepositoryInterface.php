<?php


namespace App\Repositories\RepositoryInterfaces;


interface ServiceRepositoryInterface
{
    /**
     * get all service
     *
     * @return mixed
     */
    public function fetchAll();

    /**
     * create a service
     *
     * @param $service
     * @return mixed
     */
    public function create($service);

    /**
     * get a service
     *
     * @param int $serviceId
     * @return mixed
     */
    public function show(int $serviceId);

    /**
     * update a service
     *
     * @param $Service
     * @param $serviceId
     * @return mixed
     */
    public function update($Service ,$serviceId);

    /**
     * delete a service
     *
     * @param $serviceId
     * @return mixed
     */
    public function delete($serviceId);
}
