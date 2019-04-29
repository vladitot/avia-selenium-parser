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
    public function getNextStep(): Step;
}