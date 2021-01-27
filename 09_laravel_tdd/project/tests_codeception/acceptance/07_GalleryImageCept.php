<?php

$I = new AcceptanceTester($scenario ?? null);

$I->wantTo('can add images to gallery');

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
$galleryTitle="someTitleGallery";

$pageID = $I->haveInDatabase('pages', [
    'title' => $pageTitle,
    'website_id' => $website_id
]);

$galleryID = $I->haveInDatabase('galleries', [
    'title' => $galleryTitle,
    'page_id' => $pageID
]);

$I->amOnPage('/' . $url . '.com/admin/pages/' . $pageID.'/galleries/'.$galleryID);

$I->see("no images for this gallery");

$I->click('add image');

$I->seeCurrentUrlEquals('/' . $url . '.com/admin/pages/' . $pageID.'/galleries/'.$galleryID.'/images/create');

$I->see("Adding an image");

$I->click('Add');

$I->seeCurrentUrlEquals('/' . $url . '.com/admin/pages/' . $pageID.'/galleries/'.$galleryID.'/images/create');

$I->see('The title field is required.', 'li');
$I->see('The file field is required.', 'li');

$imageTitle = "SomeTitleImage";
$imageFile = "image.jpeg";

$I->fillField('title', $imageTitle);
$I->attachFile('input[name=file]', 'image.jpeg');

$I->dontSeeInDatabase('images', [
    'title' => $imageTitle
]);

$I->click('Add');

$I->seeInDatabase('images', [
    'title' => $imageTitle
]);
