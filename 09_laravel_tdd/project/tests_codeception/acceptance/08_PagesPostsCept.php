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

$I->see($postTitle, 'tr > td');

$I->click("Details");

$I->seeCurrentUrlEquals('/' . $url . '.com/admin/pages/' . $pageID . '/posts/' . $postID);

$I->click('Edit');

$I->seeCurrentUrlEquals('/' . $url . '.com/admin/pages/' . $pageID . '/posts/' . $postID . '/edit');
$I->see('Editing a post', 'h2');

$I->seeInField('title', $postTitle);

$I->fillField('title', "");

$I->click('Update');

$I->seeCurrentUrlEquals('/' . $url . '.com/admin/pages/' . $pageID . '/posts/' . $postID . '/edit');
$I->see('The title field is required.', 'li');

$NewTitle = 'NewTitle';

$I->fillField('title', $NewTitle);
$I->click('Update');

$I->seeCurrentUrlEquals('/' . $url . '.com/admin/pages/' . $pageID . '/posts/' . $postID);

$I->see($NewTitle);

$I->dontSeeInDatabase('posts', [
    'title' => $postTitle
]);

$I->SeeInDatabase('posts', [
    'title' => $NewTitle
]);

$I->click('Delete');

$I->seeCurrentUrlEquals('/' . $url . '.com/admin/pages/' . $pageID . '/posts');

$I->dontSeeInDatabase('posts', [
    'title' => $NewTitle,
]);

$pageTitle2 = "SomeTitleTest2";
$body2="Lorem Impsum v2";

$pageID2 = $I->haveInDatabase('pages', [
    'title' => $pageTitle2,
    'website_id' => $website_id
]);

$Title2 = 'NewExampleTitle';

$I->haveInDatabase('posts', [
    'title' => $Title2,
    'body'=>$body2,
    'page_id' => $pageID2
]);

$I->amOnPage('/' . $url . '.com/admin/pages/' . $pageID2);

$I->click('Delete');

$I->dontSeeInDatabase('pages', [
    'title' => $pageTitle2
]);

$I->dontSeeInDatabase('posts', [
    'title' => $Title2,
    'page_id' => $pageID2
]);

