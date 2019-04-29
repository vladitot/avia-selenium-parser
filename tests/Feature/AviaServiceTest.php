<?php

namespace Tests\Feature;

use App\Service\ActorCreator;
use App\Service\Realization\Avia;
use Codeception\Application;
use Codeception\Codecept;
use Codeception\Configuration;
use Codeception\Scenario;
use Codeception\SuiteManager;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AviaServiceTest extends TestCase
{

    /**
     * @throws \Codeception\Exception\ConfigurationException
     * @throws \Codeception\Exception\ModuleException
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function testHandling() {
        $service = app()->make('\App\Service\Service');
        $service->setActor(ActorCreator::createActor());

        /** @var \App\Service\Request\Scenario $scenario */
        $scenario = app()->make('\App\Service\Request\Scenario');

        /** @var \App\Service\Request\Step $step */
        $step = app()->make('\App\Service\Request\Step');

        $step->setMethod('amOnUrl');
        $step->setArguments(['https://2ip.ru']);
        $scenario->addStep($step);

        /** @var \App\Service\Request\Step $step */
        $step = app()->make('\App\Service\Request\Step');
        $step->setMethod('see');
        $step->setArguments(['Скорость интернет соединения']);
        $scenario->addStep($step);

        /** @var \App\Service\Request\Step $step */
        $step = app()->make('\App\Service\Request\Step');
        $step->setMethod('grabTextFrom');
        $step->setArguments(['#content-articles-block h2']);
        $scenario->addStep($step);

        $result = $service->handle($scenario);

        $this->assertTrue(end($result)['result']=='Последние статьи');
    }


    /**
     * A basic feature test example.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function testCreationType()
    {
        $service = app()->make('\App\Service\Service');
        $this->assertInstanceOf(Avia::class, $service);
    }


    /**
     * @throws \Codeception\Exception\ConfigurationException
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Exception
     */
    public function testBrowserSetUp()
    {
        $service = app()->make('\App\Service\Service');
        $service->setActor(ActorCreator::createActor());

        /** @var \AcceptanceTester $actor */
        $actor = $service->getActor();

        $actor->amOnUrl("https://google.com");
        $actor->see('Google');
    }


}
