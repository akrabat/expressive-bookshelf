<?php
/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Action\HomePageAction::class, 'home');
 * $app->post('/album', App\Action\AlbumCreateAction::class, 'album.create');
 * $app->put('/album/:id', App\Action\AlbumUpdateAction::class, 'album.put');
 * $app->patch('/album/:id', App\Action\AlbumUpdateAction::class, 'album.patch');
 * $app->delete('/album/:id', App\Action\AlbumDeleteAction::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Action\ContactAction::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */

$app->get('/', App\Action\HomePageAction::class, 'home');

$app->get('/authors', Bookshelf\Action\AuthorListAction::class, 'author.list');
$app->get('/authors/{id:\d+}', Bookshelf\Action\AuthorViewAction::class, 'author.view');
$app->get('/authors/{id:\d+}/edit', Bookshelf\Action\AuthorEditAction::class, 'author.edit');
$app->post('/authors/{id:\d+}/update', Bookshelf\Action\AuthorUpdateAction::class, 'author.update');
$app->route('/authors/{id:\d+}/delete', Bookshelf\Action\AuthorDeleteAction::class, ['GET', 'POST'], 'author.delete');

$app->get('/books', Bookshelf\Action\BookListAction::class, 'book.list');
$app->get('/books/{id:\d+}', Bookshelf\Action\BookViewAction::class, 'book.view');
