<?php
/**
 * Created by PhpStorm.
 * User: vladitot
 * Date: 29.04.19
 * Time: 14:29
 */

namespace App\Service\Request;
interface Scenario
{
    /**
     * Get next scenario step
     * @return Step
     */
    public function getNextStep();

    /**
     * Add Scenario step
     * @param Step $step
     */
    public function addStep(Step $step);
}