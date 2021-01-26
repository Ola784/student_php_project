<?php
$I = new AcceptanceTester($scenario ?? null);

$I->wantTo('have pages under website');

$I->amOnPage('/dashboard');
$I->seeCurrentUrlEquals('/login');

$url='mypage';

$I->fillField('email', 'john.doe@gmail.com');
$I->fillField('password', 'secret');
$I->fillField('url', $url);

$I->click('Login');

$I->seeCurrentUrlEquals('/dashboard');

/*
$website_id=$I->haveInDatabase('websites', [
    'url' => $url,
    'user_id' => 1
])*/
/*
$website_id=$I->seeInDatabase('websites', [
    'url' => $url,
    'user_id' => 1
]);*/

$website_id = $I->grabFromDatabase('websites', 'id', [
    'url' => $url
]);

$I->amOnPage($url.'.com/admin/pages');

$I->see('There are no pages yet');

$I->click('Create new...');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/create');

$I->see('Creating a page', 'h2');

$I->click('Create');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/create');

$I->see('The title field is required.', 'li');

$pageTitle="ABC.com";

$I->fillField('title', $pageTitle);

$I->dontSeeInDatabase('pages', [
    'title' => $pageTitle
]);

$I->click('Create');

$I->SeeInDatabase('pages', [
    'title' => $pageTitle,
    'website_id'=> $website_id
]);

$pageID = $I->grabFromDatabase('pages', 'id', [
    'title' => $pageTitle
]);

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID);


$I->see("Viewing a page", 'h2');
$I->see('menus');
$I->see('posts');
$I->see('galleries');

$I->amOnPage('/'.$url.'.com/admin/pages');

$I->see("$pageTitle", 'tr > td');

$I->click('Details');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID);

$I->click('Edit');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID. '/edit');
$I->see('Editing a page', 'h2');

$I->seeInField('title', $pageTitle);

$I->fillField('title', "");

$I->click('Update');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID. '/edit');
$I->see('The title field is required.', 'li');

$pageNewTitle = 'NewPageTitle';

$I->fillField('title', $pageNewTitle);
$I->click('Update');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID);

//$I->see($pageNewTitle);

$I->dontSeeInDatabase('pages', [
    'title' => $pageTitle
]);

$I->seeInDatabase('pages', [
    'title' => $pageNewTitle
]);

$I->click('Delete');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages');

$I->dontSeeInDatabase('pages', [
    'title' => $pageNewTitle
]);
