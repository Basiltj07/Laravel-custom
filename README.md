<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">Customized By : <img src="https://inapp.com/wp-content/uploads/2018/07/InApp-Logo-CMYK.jpg" width="75"></p>

<p align="center">
Version 1.0.0
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## What we have done

We have customized the Laravel framework to improve reusability, easy installation and maintenance.

With this package, we have included:

- Controller-Service-Repository-Model Architecture.
- Custom artisan commands to create Modules, Services and Repositories.
- Single step shell script to install and configure basic framework structure.
- New base repository abstract class with built-in database functions.

## Usage

- **php artisan customCMD:module {Module_name}** - To create a module which includes Controller, Service, Repository and Model.
- **php artisan customCMD:service {Service_name}** - To create a Service
    - If the Service needs to be created within a directory, you need to specify the directory name as well.
- **php artisan customCMD:repository {Repository_name}** - To create a Repository
    - If the Repository needs to be created within a directory, you need to specify the directory name as well.

## Prerequisite

- php >7.2
- php modules - psql, mysql, mbstring, xml, gd, curl
- apache >2.4
- GIT
- Composer


## Support

If you find any difficulty in setting up or development with this package, please send an e-mail to the contributors. All issues will be promptly addressed.


## Contributors

**[Akshay S](mailto:akshay.s@inapp.com)**

**[Arjun R Kumar](mailto:arjun.kumar@inapp.com)**

**[Basil TJ](mailto:basil@inapp.com)**

**[Bobin Lukose](mailto:bobin.lukose@inapp.com)**

**[Kavya Sasikala](mailto:kavya.sasikala@inapp.com)**

**[RJ Anoop](mailto:anoop.rj@inapp.com)**

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).