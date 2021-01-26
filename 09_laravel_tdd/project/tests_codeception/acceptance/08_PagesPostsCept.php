<?php

$I = new AcceptanceTester($scenario ?? null);

$I->wantTo('have posts page');

$I->amOnPage('/dashboard');
$I->seeCurrentUrlEquals('/login');

$url = 'mypage';

$I->fillField('email', 'john.doe@gmail.com');
$I->fillField('password', 'secret');
$I->fillField('url', $url);

$I->click('Login');

$I->seeCurrentUrlEquals('/dashboard');

$website_id = $I->grabFromDatabase('websites', 'id', [
    'url' => $url
]);

$pageTitle = "SomeTitleTest";

$pageID = $I->haveInDatabase('pages', [
    'title' => $pageTitle,
    'website_id' => $website_id
]);

$I->amOnPage('/' . $url . '.com/admin/pages/' . $pageID);

$I->click('posts');

$I->seeCurrentUrlEquals('/' . $url . '.com/admin/pages/' . $pageID . '/posts');
//$I->see('List of posts', 'h2');

$I->see('No posts for this page');

$I->click('Create new...');

$I->seeCurrentUrlEquals('/' . $url . '.com/admin/pages/' . $pageID . '/posts/create');

$I->see('Creating a post', 'h2');

$I->click('Create');

$I->seeCurrentUrlEquals('/' . $url . '.com/admin/pages/' . $pageID . '/posts/create');

$I->see('The title field is required.', 'li');

$postTitle = "SomeTitlePost";
$postBody="SomeText Lorem Ipsum";

$I->fillField('title', $postTitle);
$I->fillField('body',$postBody);

$I->dontSeeInDatabase('posts', [
    'title' => $postTitle
]);

$I->click('Create post');
//$I->click('Create');

$I->seeInDatabase('posts', [
    'title' => $postTitle
]);

$postID = $I->grabFromDatabase('posts', 'id', [
    'title' => $postTitle
]);

$I->seeCurrentUrlEquals('/' . $url . '.com/admin/pages/' . $pageID . '/posts/' . $postID);

$I->see("Viewing a post", 'h2');
$I->see($postTitle);

$I->amOnPage('/' . $url . '.com/admin/pages/' . $pageID . '/posts');

$I->see("$postBody", 'tr > td');

$I->click($postTitle);

$I->seeCurrentUrlEquals('/' . $url . '.com/admin/pages/' . $pageID . '/posts/' . $postID);

$I->click('Edit');

$I->seeCurrentUrlEquals('/' . $url . '.com/admin/pages/' . $pageID . '/posts/' . $postID . '/edit');
$I->see('Editing a post', 'h2');
/*
$I->seeInField('title', $menuTitle);

$I->fillField('title', "");

$I->click('Update');

$I->seeCurrentUrlEquals('/' . $url . '.com/admin/pages/' . $pageID . '/menus/' . $menuID . '/edit');
$I->see('The title field is required.', 'li');

$menuNewTitle = 'NewMenuTitle';

$I->fillField('title', $menuNewTitle);
$I->click('Update');

$I->seeCurrentUrlEquals('/' . $url . '.com/admin/pages/' . $pageID . '/menus/' . $menuID);

$I->see($menuNewTitle);

$I->dontSeeInDatabase('menus', [
    'title' => $menuTitle
]);

$I->SeeInDatabase('menus', [
    'title' => $menuNewTitle
]);

$I->click('Delete');

$I->seeCurrentUrlEquals('/' . $url . '.com/admin/pages/' . $pageID . '/menus');

$I->dontSeeInDatabase('menus', [
    'title' => $menuNewTitle,
]);

$pageTitle2 = "SomeTitleTest2";

$pageID2 = $I->haveInDatabase('pages', [
    'title' => $pageTitle2,
    'website_id' => $website_id
]);

$menuTitle2 = 'NewExampleTitle';

$I->haveInDatabase('menus', [
    'title' => $menuTitle2,
    'page_id' => $pageID2,
    'link' => $link
]);

$I->amOnPage('/' . $url . '.com/admin/pages/' . $pageID2);

$I->click('Delete');

$I->dontSeeInDatabase('pages', [
    'title' => $pageTitle2
]);

$I->dontSeeInDatabase('menus', [
    'title' => $menuTitle2,
    'page_id' => $pageID2
]);
*/
