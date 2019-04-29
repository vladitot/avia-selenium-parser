<?php
/**
 * Created by PhpStorm.
 * User: vladitot
 * Date: 29.04.19
 * Time: 15:03
 */

namespace App\Service\Realization;


class Step implements \App\Service\Request\Step
{

    private $method;
    private $arguments;

    /**
     * Method we should to do.
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Arguments for this method.
     * @return array
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    public function setArguments(array $arguments)
    {
        $this->arguments = $arguments;
    }

    public function setMethod(string $method)
    {
        $this->method = $method;
    }
}