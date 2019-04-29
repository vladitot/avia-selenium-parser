<?php
/**
 * Created by PhpStorm.
 * User: vladitot
 * Date: 29.04.19
 * Time: 14:34
 */

interface Step
{
    /**
     * Method we should to do.
     * @return string
     */
    public function getMethod(): string;


    /**
     * Arguments for this method.
     * @return array
     */
    public function getArguments(): array;
}