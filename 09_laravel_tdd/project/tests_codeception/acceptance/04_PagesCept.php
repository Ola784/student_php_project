<?php
$I = new AcceptanceTester($scenario ?? null);

$I->wantTo('have pages under website');

$I->amOnPage('/dashboard');
$I->seeCurrentUrlEquals('/login');

$url='mypage.com';

$I->fillField('email', 'john1.doe@gmail.com');
$I->fillField('password', 'secret');
$I->fillField('url', $url);

$I->click('Login');

$I->seeCurrentUrlEquals('/dashboard');

$website_id=$I->haveInDatabase('websites', [
    'url' => $url,
    'user_id' => 1
]);

$I->amOnPage($url.'/admin/pages');

$I->see('No pages in database');

$I->click('Create new...');

$I->seeCurrentUrlEquals('/'.$url.'/admin/pages/create');

$I->see('Creating a page', 'h2');

$I->click('Create');

$I->seeCurrentUrlEquals('/'.$url.'/admin/pages/create');

$I->see('The title field is required.', 'li');

$pageTitle="ABC.com";

$I->fillField('title', $pageTitle);

$I->dontSeeInDatabase('pages', [
    'title' => $pageTitle
]);

$I->click('Create');

$I->SeeInDatabase('pages', [
    'title' => $pageTitle
]);

$pageID = $I->grabFromDatabase('pages', 'id', [
    'title' => $pageTitle
]);

$I->seeCurrentUrlEquals('/'.$url.'/admin/pages/'.$pageID);


$I->see("Viewing a page", 'h2');
$I->see('menus');
$I->see('posts');
$I->see('gallery');

$I->amOnPage('/'.$url.'/admin/pages');

$I->see("$pageTitle", 'tr > td');

$I->click('Details');

$I->seeCurrentUrlEquals('/'.$url.'/admin/pages/'.$pageID);

$I->click('Edit');

$I->seeCurrentUrlEquals('/'.$url.'/admin/pages/'.$pageID. '/edit');
$I->see('Editing a page', 'h2');

$I->seeInField('title', $pageTitle);

$I->fillField('title', "");

$I->click('Update');

$I->seeCurrentUrlEquals('/'.$url.'/admin/pages/'.$pageID. '/edit');
$I->see('The title field is required.', 'li');

$pageNewTitle = 'NewPageTitle';

$I->fillField('title', $pageNewTitle);
$I->click('Update');

$I->seeCurrentUrlEquals('/'.$url.'/admin/pages/'.$pageID);

//$I->see($pageNewTitle);

$I->dontSeeInDatabase('pages', [
    'title' => $pageTitle
]);

$I->seeInDatabase('pages', [
    'title' => $pageNewTitle
]);

$I->click('Delete');

$I->seeCurrentUrlEquals('/'.$url.'/admin/pages');

$I->dontSeeInDatabase('pages', [
    'title' => $pageNewTitle
]);
