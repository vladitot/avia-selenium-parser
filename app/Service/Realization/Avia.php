<?php
/**
 * Created by PhpStorm.
 * User: vladitot
 * Date: 29.04.19
 * Time: 14:47
 */
namespace App\Service\Realization;

use App\Service\Request\Scenario;
use App\Service\Service;

class Avia extends Service
{

    /**
     * Some service, which can handle request and return some result.
     * @param Scenario $request
     * @return array
     */
    public function handle(Scenario $request): array
    {
        $result = [];

        while($step = $request->getNextStep()) {

            $method = $step->getMethod();
            $arguments = $step->getArguments();

            $currentResult = ['method'=>$method, 'arguments'=>implode(',', $arguments)];

            $currentResult['result'] = $this->actor->$method(...$arguments);
            $result[] = $currentResult;
        }

        return $result;
    }
}