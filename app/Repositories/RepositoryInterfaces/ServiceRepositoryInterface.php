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
    public function fetch(int $serviceId);

    /**
     * update a service
     *
     * @param $service
     * @param $serviceId
     * @return mixed
     */
    public function update($service ,$serviceId);

    /**
     * delete a service
     *
     * @param $serviceId
     * @return mixed
     */
    public function delete($serviceId);
}
