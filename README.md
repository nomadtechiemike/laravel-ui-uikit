# UIkit frontend UI preset for Laravel

![](https://torrix.uk/laravel-ui-uikit.jpg)

Out of the box, Laravel ships with a [UI preset](https://github.com/laravel/ui) for [Bootstrap](https://getbootstrap.com/) and [Vue](https://vuejs.org/) to make getting your website front-end up and running simple.

Whilst Bootstrap is a very popular front-end framework, with lots of fans, I much prefer a framework made by [YOOtheme](https://yootheme.com/) called **[UIkit](https://getuikit.com/)** myself. It's modern, clean, well-thought-out, and modular. It's my go-to framework now for websites and web applications, from tiny single-page landing sites, to massive web applications with thousands of users.

This repository contains my alternative to the stock preset that [Laravel UI](https://github.com/laravel/ui) provides.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

To begin, you'll need a fresh install of Laravel 6. This in turn needs Composer, which for convenience is best installed globally. Something like the following will get you up and running:

```
composer global require laravel/installer

laravel new mysite

php artisan serve
```

Your development site will be served at http://localhost:8000. If you have problems getting this far, refer to the [Laravel installation docs](https://laravel.com/docs/6.x/installation).

### Installing this preset

To turn a stock bootstrap-based install into a UIkit skeleton site, follow the steps below.

1. Include this repository into your composer dependencies:

```
composer require torrix/laravel-ui-uikit dev-master
```

2. Run the artisan command to install the preset into your Laravel install. It will ask you if you'd like to overwite welcome.blade.php. As long as you haven't started changing your blade files, this is fine to proceed with:

```
php artisan ui vue --auth
```

3. Finally, run NPM to download UIkit, and build your assets using Laravel Mix:

```
npm install && npm run dev
```

4. (optional) Whilst developing your site, running Mix in watch mode makes it easy to make changes and quickly see their results:

```
npm run watch
```

## Deployment

When deploying to a live server, ensure to build your assets in production mode for smaller, faster downloads:
```
npm run prod
```

## Built With

* [Laravel](https://laravel.com/) - The awesome PHP framework that makes all of this worthwhile.
* [Laravel UI](https://github.com/laravel/ui) - The default Bootstrap preset Laravel ships with, and this project is based on.
* [UIkit](https://getuikit.com/) - The beautiful, powerful front-end framework that you'll be delighted to build your next Laravel project with!

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/Torrix/laravel-ui-uikit/tags). 

## Authors

* **Matt Fletcher** - *This UIkit preset* - [Torrix](https://torrix.uk)
* **Taylor Otwell** - *The original Bootstrap preset* - [Laravel UI](https://github.com/laravel/ui)

## License

This preset is based on and extends the license of Laravel UI itself, and is therefore open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT) - see the [LICENSE.md](LICENSE.md) file for details
