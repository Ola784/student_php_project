<?php

$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('see homepage');

$I->amOnPage('/');

$I->seeInTitle('LARVAVEL CMS');

/*
$I->seeLink("Documentation", "https://laravel.com/docs");
$I->seeLink("Laracasts", "https://laracasts.com");
$I->seeLink("Forge", "https://forge.laravel.com");
*/
