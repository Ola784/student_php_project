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

$pageTitle="SomeTitle";

$page_id=$I->haveInDatabase('pages', [
    'title' => $pageTitle
]);

$I->amOnPage('/mypage.com/admin');
//$I->amOnPage('/$pageTitle/admin');

$I->click('menus');
/*
$I->seeCurrentUrlEquals('/books/' . $book_id . '/comments');
$I->see('List of comments', 'h2');

$I->see('No comments for this book');

$I->click('Create new...');

$I->seeCurrentUrlEquals('/books/'.$book_id.'/comments/create');

$I->see('Creating a comment', 'h2');

$I->click('Create');

$I->seeCurrentUrlEquals('/books/'.$book_id.'/comments/create');

$I->see('The title field is required.', 'li');
$I->see('The text field is required.', 'li');

$commentTitle = "SomeTitleComment";
$commentText = "SomeDescription to comment";

$I->fillField('title', $commentTitle);
$I->fillField('text', $commentText);

$I->dontSeeInDatabase('comments', [
    'title' => $commentTitle,
    'text' => $commentText
]);

$I->click('Create');

$I->SeeInDatabase('comments', [
    'title' => $commentTitle,
    'text' => $commentText
]);

$comment_id = $I->grabFromDatabase('comments', 'id', [
    'title' => $commentTitle
]);

$I->seeCurrentUrlEquals('/books/' . $book_id . '/comments/'.$comment_id);

$I->see("Viewing a comment", 'h2');
$I->see($commentTitle);
$I->see($commentText);

$I->amOnPage('/books/'. $book_id . '/comments');

$I->see("$commentTitle", 'tr > td');
$I->see("$commentText",'tr>td');

$I->click('Details');

$I->seeCurrentUrlEquals('/books/' . $book_id . '/comments/'.$comment_id);

$I->click('Edit');

$I->seeCurrentUrlEquals('/books/' . $book_id . '/comments/'.$comment_id.'/edit');
$I->see('Editing a comment', 'h2');

$I->seeInField('title', $commentTitle);
$I->seeInField('text', $commentText);

$I->fillField('text', "");

$I->click('Update');

$I->seeCurrentUrlEquals('/books/' . $book_id . '/comments/'.$comment_id.'/edit');
$I->see('The text field is required.', 'li');

$commentNewText = 'NewCommentText';

$I->fillField('text', $commentNewText);
$I->click('Update');

$I->seeCurrentUrlEquals('/books/' . $book_id . '/comments/'.$comment_id);

$I->see($commentNewText);

$I->dontSeeInDatabase('comments', [
    'title' => $commentTitle,
    'text' => $commentText
]);

$I->SeeInDatabase('comments', [
    'title' => $commentTitle,
    'text' => $commentNewText
]);

$I->click('Delete');

$I->seeCurrentUrlEquals('/books/' . $book_id . '/comments');

$I->dontSeeInDatabase('comments', [
    'title' => $commentTitle,
    'text' => $commentNewText
]);

$bookIsbn2 = "1234512345128";
$bookTitle2 = "SomeTitleTest2";
$bookDescription2 = "SomeDescription";

$book_id2=$I->haveInDatabase('books', [
    'isbn' => $bookIsbn2,
    'title' => $bookTitle2,
    'description' => $bookDescription2
]);

$commentTitle2='NewExampleTitle';
$commentNewText2='NewExampleText';

$I->haveInDatabase('comments', [
    'title' => $commentTitle2,
    'text' => $commentNewText2,
    'book_id'=>$book_id2
]);

$I->amOnPage('/books/' . $book_id2);

$I->click('Delete');

$I->dontSeeInDatabase('books', [
    'isbn' => $bookIsbn2,
    'description' => $bookDescription2
]);

$I->dontSeeInDatabase('comments',[
    'title'=>$commentTitle2,
    'text'=>$commentNewText2
]);


/*
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

*/
