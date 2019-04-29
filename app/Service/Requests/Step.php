<?php
/**
 * Created by PhpStorm.
 * User: vladitot
 * Date: 29.04.19
 * Time: 14:34
 */
namespace App\Service\Request;
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

    public function setMethod(string $method);

    public function setArguments(array $arguments);
}