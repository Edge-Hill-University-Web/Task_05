<?php

namespace Tests\Unit;

use Codeception\Test\Unit;

class AboutPageTest extends Unit
{
    /**
     * @var \Tests\Support\UnitTester
     */
    protected $tester;

    public function testRouteNameIsRegistered()
    {
        $routeCollection = app('router')->getRoutes();
        $this->assertNotNull($routeCollection->getByName('about'));
    }

    public function testEmailFormatIsValid()
    {
        $email = 'contact@company.com';
        $this->assertMatchesRegularExpression('/^[\w.+-]+@\w+\.\w+$/', $email);
    }

    public function testStaticHeadingExistsInView()
    {
        $view = view('about')->render();
        $this->assertStringContainsString('Welcome to Our Company', $view);
    }

        public function testPageTitleIsAboutUs()
    {
        $view = view('about')->render();
        $this->assertStringContainsString('<title>About Us</title>', $view);
    }

    public function testPageHasExpectedContent()
    {
        $view = view('about')->render();
        $this->assertStringContainsString('We provide quality services.', $view);
    }

    public function testPageHasNoForm()
    {
        $view = view('about')->render();
        $this->assertStringNotContainsString('<form', $view);
    }
}