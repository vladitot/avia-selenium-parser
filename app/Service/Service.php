<?php
/**
 * Created by PhpStorm.
 * User: vladitot
 * Date: 29.04.19
 * Time: 14:22
 */

abstract class Service
{
    /**
     * Some service, which can handle request and return some result.
     * @param array $request
     * @return mixed
     */
    abstract function handle(array $request): array;
}