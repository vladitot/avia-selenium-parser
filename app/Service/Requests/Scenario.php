<?php
/**
 * Created by PhpStorm.
 * User: vladitot
 * Date: 29.04.19
 * Time: 14:29
 */

interface Scenario
{
    public function getNextStep(): Step;
}