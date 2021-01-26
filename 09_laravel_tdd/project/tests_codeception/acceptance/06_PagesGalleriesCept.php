<?php
$I = new AcceptanceTester($scenario ?? null);

$I->wantTo('have galleries page');

$I->amOnPage('/dashboard');
$I->seeCurrentUrlEquals('/login');

$url='mypage';

$I->fillField('email', 'john.doe@gmail.com');
$I->fillField('password', 'secret');
$I->fillField('url', $url);

$I->click('Login');

$I->seeCurrentUrlEquals('/dashboard');

$website_id = $I->grabFromDatabase('websites', 'id', [
    'url' => $url
]);

$pageTitle = "SomeTitleTest";

$pageID=$I->haveInDatabase('pages', [
    'title' => $pageTitle,
    'website_id'=> $website_id
]);

$I->amOnPage('/'.$url.'.com/admin/pages/'.$pageID);

$I->click('galleries');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/galleries');
$I->see('List of galleries', 'h2');

$I->see('No galleries for this page');

$I->click('Create new...');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/galleries/create');

$I->see('Creating a gallery', 'h2');

$I->click('Create');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/galleries/create');

$I->see('The title field is required.', 'li');

$galleryTitle = "SomeTitleGallery";
$link='/'.$url.'.com/admin/pages/'.$pageID.'/galleries/1';

$I->fillField('title', $galleryTitle);

$I->dontSeeInDatabase('galleries', [
    'title' => $galleryTitle
]);

$I->click('Create');

$I->seeInDatabase('galleries', [
    'title' => $galleryTitle
]);

$galleryID = $I->grabFromDatabase('galleries', 'id', [
    'title' => $galleryTitle
]);

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/galleries/'.$galleryID);

$I->see("Viewing a gallery", 'h2');
$I->see($galleryTitle);

$I->amOnPage('/'.$url.'.com/admin/pages/'.$pageID.'/galleries');

$I->see("$galleryTitle", 'tr > td');

$I->click('Details');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/galleries/'.$galleryID);

$I->click('Edit');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/galleries/'.$galleryID.'/edit');
$I->see('Editing a gallery', 'h2');

$I->seeInField('title', $galleryTitle);

$I->fillField('title', "");

$I->click('Update');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/galleries/'.$galleryID.'/edit');
$I->see('The title field is required.', 'li');

$galleryNewTitle = 'NewGalleryTitle';

$I->fillField('title', $galleryNewTitle);
$I->click('Update');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/galleries/'.$galleryID);

$I->see($galleryNewTitle);

$I->dontSeeInDatabase('galleries', [
    'title' => $galleryTitle
]);

$I->SeeInDatabase('galleries', [
    'title' => $galleryNewTitle
]);

$I->click('Delete');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/galleries');

$I->dontSeeInDatabase('galleries', [
    'title' => $galleryNewTitle,
]);

$pageTitle2 = "SomeTitleTest2";

$pageID2=$I->haveInDatabase('pages', [
    'title' => $pageTitle2,
    'website_id'=>$website_id
]);

$galleryTitle2='NewExampleTitle';

$I->haveInDatabase('galleries', [
    'title' => $galleryTitle2,
    'page_id'=>$pageID2
]);

$I->amOnPage('/'.$url.'.com/admin/pages/'.$pageID2);

$I->click('Delete');

$I->dontSeeInDatabase('pages', [
    'title' => $pageTitle2
]);

$I->dontSeeInDatabase('galleries',[
    'title' => $galleryTitle2,
    'page_id'=>$pageID2
]);
