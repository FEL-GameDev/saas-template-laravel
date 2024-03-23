## Setup

### Get the app up and running

- (Windows) Install xampp
- Install composer, use the xampp version of PHP during setup
- Install nodejs
- Clone the repo into the htdocs folder of xampp

- Open the project in your code editor and open a terminal
- Run `composer up` to install Laravel and its dependencies
- Run `npm install` to install the necessary packages
- Generate an application encryption key using `php artisan key:generate` (this is also available in the web browser if
  you navigate to the correct address for the public folder)
- Run `php artisan migrate`
- Run `npm run dev` to start the vite compiler
- Check out `localhost/saas-template-laravel/public`

### Configure a local convenience domain

- Open up windows hosts file `C:\Windows\System32\drivers\etc`
- Add hosts record for example
  `127.0.0.1	mysaaslocal.com`

- Open up the xampp `https-vhosts.conf` file from `C:\xampp\apache\conf\extra`
- Add a record here for your virtual host

```shell
<VirtualHost *:80>
	DocumentRoot "C:/xampp/htdocs/saas-template-laravel/public"
	ServerName mysaaslocal.com
</VirtualHost>
```

- Restart your apache server using xampp
- Visit your new convenience domain in the browser
- Profit.

### Setting up Laravel Dusk (Browser Testing)

Check your local apache php.ini file for the following settings and remove the `;` if they are commented out

```shell
extension=zip
```

- Restart your apache server
- Run `php artisan dusk:install` to install Dusk

### Ensure local tests do not reset the local dev Database

Ensure that the config in `phpunit.xml` in the root folder has the following two lines uncommented

```xml

<php>
    ...
    <env name="DB_CONNECTION" value="sqlite"/>
    <env name="DB_DATABASE" value=":memory:"/>
    ...
</php>
```

Run mailpit.exe then open the [web portal](http://localhost:8025/)

### Setting up mailpit

Download [mailpit](https://github.com/axllent/mailpit/releases) to the root directory. Ensure your .env has the
following settings

```dotenv
MAIL_MAILER=smtp
MAIL_HOST=localhost
MAIL_PORT=1025
```

## IDE Helpers [Awaiting update for Laravel 11.0]

From time to time, changes to your model will need to be reflected in your IDE. Run the following command to update your
IDE helper files

- Run `composer require --dev barryvdh/laravel-ide-helper` for helping your IDE know about fields in your models

```shell
php artisan ide-helper:models
```

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and
creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in
many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache)
  storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all
modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a
modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video
tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging
into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in
becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in
the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by
the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell
via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
