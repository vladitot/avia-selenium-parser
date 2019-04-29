<?php
/**
 * Created by PhpStorm.
 * User: vladitot
 * Date: 29.04.19
 * Time: 19:45
 */

namespace App\Service;
use Codeception\Codecept;
use Codeception\Configuration;
use Codeception\Scenario;
use Codeception\SuiteManager;

class ActorCreator
{
    /**
     * @return mixed
     * @throws \Codeception\Exception\ConfigurationException
     * @throws \Codeception\Exception\ModuleException
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public static function createActor() {
        return self::loadCodeceptAndGetActor();
    }

    /**
     * @return mixed
     * @throws \Codeception\Exception\ConfigurationException
     * @throws \Codeception\Exception\ModuleException
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Exception
     */
    private static function loadCodeceptAndGetActor() {
        $codecept = new Codecept([]);
        $config = Configuration::config();
        $settings = Configuration::suiteSettings('acceptance', $config);
        require_once(__DIR__.'/../../vendor/codeception/codeception/autoload.php');
        $suiteManager = new SuiteManager($codecept->getDispatcher(), 'acceptance', $settings);
        $suiteManager->initialize();
        $unit = app()->make('\Codeception\Test\Unit');
        $suiteManager->getModuleContainer()->getModule('WebDriver')->_initialize();
        $suiteManager->getModuleContainer()->getModule('WebDriver')->_initializeSession();
        $unit->getMetadata()->setServices([
            'dispatcher' => $codecept->getDispatcher(),
            'modules' =>  $suiteManager->getModuleContainer()
        ]);

        /** @var Scenario $scenario */
        $scenario = app()->make('\Codeception\Scenario', ['test'=>$unit]);

        /** @var \AcceptanceTester $actor */
        return app()->make('\AcceptanceTester', ['scenario'=>$scenario]);
    }
}