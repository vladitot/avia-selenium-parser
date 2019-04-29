<?php
/**
 * Created by PhpStorm.
 * User: vladitot
 * Date: 29.04.19
 * Time: 20:19
 */

namespace App\Service\Factory;
class StepFactory
{

    public static function createStep(string $method, array $arguments): \App\Service\Request\Step
    {
        /** @var \App\Service\Request\Step $step */
        $step = app()->make('\App\Service\Request\Step');
        $step->setMethod($method);
        $step->setArguments($arguments);
        return $step;
    }
}