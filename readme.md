# Web Crawler - Square One

Using the web crawler Goutte for Laravel Framework, this application gets content of the website page "https://www.appliancesdelivered.ie/dishwashers" and displays all dishwashers.
It allows you to add any article to your own wishlist, only if you are logged.
Finally, you have an access to your wishlist, and have the possibility to remove one of your wish from this page.

## Requirements

This project needs some requirements :

```
  - Git
  - Composer
  - PHP Version : 7.0.10 minimum
```

## Configuration and instructions
Download the ZIP or clone your repository with the following command :

`git clone https://github.com/Luzgard/Square-One.git projectname`

Using the command prompt, go to your project folder :

`cd path_to/projectname`

Install all dependencies with Composer :

`composer update`
 
Rename .env.example to .env :
 
`php -r "file_exists('.env') || copy('.env.example', '.env');"`
 
Generate the .env key :
 
`php artisan key:generate`
 
Create a database (for example 'web_crawler') and inform .env file :
 
```
DB_CONNECTION=mysql       // Type of connection
DB_HOST=127.0.0.1         // Host
DB_PORT=3306              // Port
DB_DATABASE=web_crawler   // Database name
DB_USERNAME=root          // Username
DB_PASSWORD=secret        // Password
```

Migrate the database structure :

`php artisan migrate`

Seed the database :

`php artisan db:seed`


Your project is ready. If you are locally hosting this project (like WAMP/MAMP etc...), go to this url address :

 `localhost:port/projectname/public`
 
<p align="center">
  <img src="https://laravel.com/assets/img/components/logo-laravel.svg">
</p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.


## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell):

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[British Software Development](https://www.britishsoftware.co)**
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Pulse Storm](http://www.pulsestorm.net/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
