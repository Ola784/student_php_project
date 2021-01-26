<?php
$I = new AcceptanceTester($scenario ?? null);

$I->wantTo('have menus page');

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

$I->click('menus');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/menus');
$I->see('List of menus', 'h2');

$I->see('No menus for this page');

$I->click('Create new...');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/menus/create');

$I->see('Creating a menu', 'h2');

$I->click('Create');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/menus/create');

$I->see('The title field is required.', 'li');

$menuTitle = "SomeTitleMenu";
$link='/'.$url.'.com/admin/pages/'.$pageID.'/menus/1';

$I->fillField('title', $menuTitle);
$I->fillField('link',$link);

$I->dontSeeInDatabase('menus', [
    'title' => $menuTitle
]);

$I->click('Create');

$I->seeInDatabase('menus', [
    'title' => $menuTitle
]);

$menuID = $I->grabFromDatabase('menus', 'id', [
    'title' => $menuTitle
]);

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/menus/'.$menuID);

$I->see("Viewing a menu", 'h2');
$I->see($menuTitle);

$I->amOnPage('/'.$url.'.com/admin/pages/'.$pageID.'/menus');

$I->see("$menuTitle", 'tr > td');

$I->click('Details');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/menus/'.$menuID);

$I->click('Edit');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/menus/'.$menuID.'/edit');
$I->see('Editing a menu', 'h2');

$I->seeInField('title', $menuTitle);

$I->fillField('title', "");

$I->click('Update');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/menus/'.$menuID.'/edit');
$I->see('The title field is required.', 'li');

$menuNewTitle = 'NewMenuTitle';

$I->fillField('title', $menuNewTitle);
$I->click('Update');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/menus/'.$menuID);

$I->see($menuNewTitle);

$I->dontSeeInDatabase('menus', [
    'title' => $menuTitle
]);

$I->SeeInDatabase('menus', [
    'title' => $menuNewTitle
]);

$I->click('Delete');

$I->seeCurrentUrlEquals('/'.$url.'.com/admin/pages/'.$pageID.'/menus');

$I->dontSeeInDatabase('menus', [
    'title' => $menuNewTitle,
]);

$pageTitle2 = "SomeTitleTest2";

$pageID2=$I->haveInDatabase('pages', [
    'title' => $pageTitle2,
    'website_id'=>$website_id
]);

$menuTitle2='NewExampleTitle';

$I->haveInDatabase('menus', [
    'title' => $menuTitle2,
    'page_id'=>$pageID2,
    'link'=>$link
]);

$I->amOnPage('/'.$url.'.com/admin/pages/'.$pageID2);

$I->click('Delete');

$I->dontSeeInDatabase('pages', [
    'title' => $pageTitle2
]);

$I->dontSeeInDatabase('menus',[
    'title' => $menuTitle2,
    'page_id'=>$pageID2
]);
