<?php
$I = new AcceptanceTester($scenario ?? null);

$I->wantTo('menus, gallery, posts are on main page');

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
$menuTitle = "SomeTitleTestMenu";
$galleryTitle="gallerytitle";
$html="
<H1>This is a Header</H1>
<P> This is a new paragraph!</P>";
$markdown='*very*';

$pageID=$I->haveInDatabase('pages', [
    'title' => $pageTitle,
    'website_id'=> $website_id,
    'content'=>$html,
    'content_markdown'=>$markdown
]);

$link='/'.$url.'.com/admin/pages/'.$pageID.'/menus/1';
$body=" some text to be displayed on main page";
$postTitle="postTitle";

//$I->dontSeeInDatabase('menus');

$menuID=$I->haveInDatabase('menus', [
    'title' => $menuTitle,
    'link'=>$link,
    'page_id'=>$pageID
]);

$galleryID=$I->haveInDatabase('galleries', [
    'title' => $galleryTitle,
    'page_id'=>$pageID
]);

$gallerylink='/'.$url.'.com/pages/'.$pageID.'/galleries/'.$galleryID;

$postID=$I->haveInDatabase('posts', [
    'title' => $postTitle,
    'page_id'=>$pageID,
    'body'=>$body
]);

$postlink= '/'.$url.'.com/pages/'.$pageID.'/posts/'.$postID;

$I->amOnPage('/'.$url.'.com/page/'.$pageID);
$I->click($pageTitle);
$I->seeCurrentUrlEquals('/'.$url.'.com/page/'.$pageID);
$I->see("This is a Header",'h1');
$I->see("This is a new paragraph!",'p');
$I->see("very");

$I->amOnPage('/'.$url.'.com/page/'.$pageID);
$I->click($menuTitle);
$I->seeCurrentUrlEquals($link);

$I->amOnPage('/'.$url.'.com/page/'.$pageID);
$I->click($galleryTitle);
$I->seeCurrentUrlEquals($gallerylink);

$I->amOnPage('/'.$url.'.com/page/'.$pageID);
$I->click($postTitle);
$I->seeCurrentUrlEquals($postlink);

$I->amOnPage('/'.$url.'.com/page/'.$pageID);
$I->see($postTitle);
$I->see($body);
$I->click("contact");
$I->seeCurrentUrlEquals("/contact");
$I->see("Name");
$I->see("Email");
$I->see("Message");

