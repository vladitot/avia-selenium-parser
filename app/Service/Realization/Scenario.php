<?php
/**
 * Created by PhpStorm.
 * User: vladitot
 * Date: 29.04.19
 * Time: 14:51
 */

namespace App\Service\Realization;


use App\Service\Request\Step;

class Scenario implements \App\Service\Request\Scenario
{

    private $steps;

    /**
     * @return Step|bool
     */
    public function getNextStep()
    {
        $current = current($this->steps);
        next($this->steps);
        return $current;
    }

    /**
     * Add Scenario step
     * @param Step $step
     */
    public function addStep(Step $step)
    {
        $this->steps[] = $step;
    }
}