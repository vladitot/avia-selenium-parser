<?php
/**
 * Created by PhpStorm.
 * User: vladitot
 * Date: 29.04.19
 * Time: 14:22
 */

namespace App\Service;
use App\Service\Request\Scenario;
use Codeception\Actor;


abstract class Service
{

    protected $actor;


    /**
     * Some service, which can handle request and return some result.
     * @param Scenario $request
     * @return mixed
     */
    abstract public function handle(Scenario $request): array;


    /**
     * Charge browser
     * @param Actor $actor
     */
    public function setActor(Actor $actor) {
        $this->actor = $actor;
    }

    /**
     * @return mixed
     */
    public function getActor()
    {
        return $this->actor;
    }


}