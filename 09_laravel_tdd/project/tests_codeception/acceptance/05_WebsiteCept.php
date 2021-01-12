<?php
$I = new AcceptanceTester($scenario ?? null);

$I->wantTo('have menus page');

$I->amOnPage('/menus');
$I->seeCurrentUrlEquals('/login');

$I->fillField('email', 'john.doe@gmail.com');
$I->fillField('password', 'secret');
$I->fillField('url', 'mypage.com');

$I->click('Login');

$I->seeCurrentUrlEquals('/menus');
$I->see('List of menus', 'h2');

$I->see('No menus in database.');

$I->click('Create new...');

$I->seeCurrentUrlEquals('/menus/create');

$I->see('Creating a menus', 'h2');
$menuTitle = "SomeTitle";

$I->fillField('title', $menuTitle);

$I->click('Create');

$I->seeInDatabase('menus', [
    'title' => $menuTitle
]);

$id = $I->grabFromDatabase('menus', 'id', [
    'title' => $menuTitle
]);
$I->amOnPage('/mypage.com');
$I->see($menuTitle,'a');
