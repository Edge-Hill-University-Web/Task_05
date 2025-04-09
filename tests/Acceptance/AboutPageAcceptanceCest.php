<?php

declare(strict_types=1);

namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class AboutPageAcceptanceCest
{
    public function aboutPageIsAccessible(AcceptanceTester $I)
    {
        $I->amOnPage('/about');
        $I->seeResponseCodeIs(200);
    }

    public function aboutPageTitleVisible(AcceptanceTester $I)
    {
        $I->amOnPage('/about');
        $I->seeInTitle('About Us');
    }

    public function headingVisible(AcceptanceTester $I)
    {
        $I->amOnPage('/about');
        $I->see('Welcome to Our Company', 'h1');
    }

    public function paragraphContentVisible(AcceptanceTester $I)
    {
        $I->amOnPage('/about');
        $I->see('We provide quality services.');
    }

    public function emailVisible(AcceptanceTester $I)
    {
        $I->amOnPage('/about');
        $I->see('contact@company.com');
    }

    public function hasNavigationMenu(AcceptanceTester $I)
    {
        $I->amOnPage('/about');
        $I->see('Home');
        $I->see('About');
        $I->see('Contact');
    }

    public function clickHomeNavigation(AcceptanceTester $I)
    {
        $I->amOnPage('/about');
        $I->click('Home');
        $I->seeCurrentUrlEquals('/');
    }


}