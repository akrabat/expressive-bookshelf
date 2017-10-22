# Expressive Bookshelf

An example [Zend Expressive](https://zendframework.github.io/zend-expressive/) application.


![Screenshot of Expressive Bookshelf](https://i.19ft.com/ba156e39.png)


## Setup

This project uses Composer. Run composer install to install the dependencies:

    $ composer install

You'll also need a copy of the database:

    $ cp data/bookshelf.db.dist data/bookshelf.db
    $ chmod a+w data/bookshelf.db


## Run

You can run using the built-in PHP server:

```bash 
$ php -S 0.0.0.0:8888 -t public
```

Browse to http://localhost:8888 to view the application.

## Application Development Mode Tool

This application comes with [zf-development-mode](https://github.com/zfcampus/zf-development-mode). 
It provides a composer script to allow you to enable and disable development mode.

### To enable development mode

**Note:** Do NOT run development mode on your production server!

```bash
$ composer development-enable
```

**Note:** Enabling development mode will also clear your configuration cache, to 
allow safely updating dependencies and ensuring any new configuration is picked 
up by your application.

### To disable development mode

```bash
$ composer development-disable
```

### Development mode status

```bash
$ composer development-status
```

## Configuration caching

By default, the application will create a configuration cache in
`data/config-cache.php`. When in development mode, the configuration cache is
disabled, and switching in and out of development mode will remove the
configuration cache.

You may need to clear the configuration cache in production when deploying if
you deploy to the same directory. You may do so using the following:

```bash
$ composer clear-config-cache
```
