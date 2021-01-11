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

$I->click('Create');

$I->seeCurrentUrlEquals('/menus/create');

$I->see('The title field is required.', 'li');

$menuTitle = "SomeTitle";

$I->fillField('title', $menuTitle);

$I->click('Create');

$I->seeInDatabase('menus', [
    'title' => $menuTitle
]);

$id = $I->grabFromDatabase('menus', 'id', [
    'title' => $menuTitle
]);

$I->seeCurrentUrlEquals('/menus/' . $id);

$I->see("Viewing a menus", 'h2');

$I->see($menuTitle);


$I->amOnPage('/menus');

$I->see("$menuTitle", 'tr > td');

$I->click('Details');

$I->seeCurrentUrlEquals('/menus/' . $id);

$I->click('Edit');

$I->seeCurrentUrlEquals('/menus/' . $id . '/edit');
$I->see('Editing a menus', 'h2');

$I->seeInField('title', $menuTitle);

$I->fillField('title', "");

$I->click('Update');

$I->seeCurrentUrlEquals('/menus/' . $id . '/edit');
$I->see('The title field is required.', 'li');

$menuNewTitle = 'NewMenuTitle';

$I->fillField('title', $menuNewTitle);
$I->click('Update');

$I->seeCurrentUrlEquals('/menus/' . $id);

$I->see($menuNewTitle);

$I->dontSeeInDatabase('menus', [
    'title' => $menuTitle
]);

$I->seeInDatabase('menus', [
    'title'=>$menuNewTitle
]);

$I->click('Delete');

$I->seeCurrentUrlEquals('/menus');

$I->dontSeeInDatabase('menus', [
    'title'=>$menuNewTitle
]);

