<?php

declare(strict_types=1);

namespace Tests\Functional;
use Tests\Support\FunctionalTester;

final class AboutPageFunctionalCest

{
    public function routeExists(FunctionalTester $I)
    {
        $I->amOnPage('/about');
        $I->seeResponseCodeIs(200);
    }

    public function correctViewLoaded(FunctionalTester $I)
    {
        $I->amOnPage('/about');
        $I->see('About Us');
    }

    public function containsExpectedKeywords(FunctionalTester $I)
    {
        $I->amOnPage('/about');
        $I->see('services');
        $I->see('company');
    }

    public function aboutPageHasValidHtml(FunctionalTester $I)
    {
        $I->amOnPage('/about');
        $I->seeElement('html');
        $I->seeElement('body');
    }

    public function pageHasMetaDescription(FunctionalTester $I)
    {
        $I->amOnPage('/about');
        $I->seeElement('meta[name=description]');
    }

    public function csrfTokenExists(FunctionalTester $I)
    {
        $I->amOnPage('/about');
        $I->seeInSource('csrf-token');
    }

    public function contactEmailLinkIsMailto(FunctionalTester $I)
    {
        $I->amOnPage('/about');
        $I->seeElement('a[href^="mailto:"]');
    }
}