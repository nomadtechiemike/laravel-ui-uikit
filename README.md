# UIkit frontend UI preset for Laravel

![](https://torrix.uk/laravel-ui-uikit.jpg)

Out of the box, Laravel ships with a [UI preset](https://github.com/laravel/ui) for [Bootstrap](https://getbootstrap.com/) and [Vue.js](https://vuejs.org/) to make getting your website front-end up and running simple.

## Laravel + UIkit = :heart_eyes:

Whilst Bootstrap is a very popular front-end framework, with lots of fans, I much prefer a framework made by [YOOtheme](https://yootheme.com/) called **[UIkit](https://getuikit.com/)** myself. It's modern, clean, well-thought-out, and modular. It's my go-to framework now for websites and web applications, from tiny single-page landing sites, to massive web applications with thousands of users.

This repository contains my alternative to the stock preset that [Laravel UI](https://github.com/laravel/ui) provides.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See Deployment for notes on how to deploy the project on a live system.

### Prerequisites

To begin, you'll need a **fresh** install of Laravel 6. **Adding this to an existing project is not recommended and may cause issues**. For full instructions on installing Laravel, refer to the [Laravel installation docs](https://laravel.com/docs/6.x/installation), but something like the following will get you up and running:

```
composer global require laravel/installer

laravel new mysite

php artisan serve
```

Your development site will be served at http://localhost:8000.

### Installing this preset

To turn this stock Bootstrap-based install into a UIkit skeleton site, follow the steps below.

1. Include this repository into your composer dependencies:

```
composer require torrix/laravel-ui-uikit
```

2. Run the artisan command to install the preset into your Laravel install. It will ask you if you'd like to overwite welcome.blade.php. As long as you haven't started changing your blade files, this is fine to proceed with:

```
php artisan ui vue --auth
```

3. Finally, run NPM to download UIkit, and build your assets using Laravel Mix:

```
npm install && npm run dev
```

## Developing with UIkit

To get started in UIkit, read [their excellent docs](https://getuikit.com/docs/introduction). The examples and tests provided should give you all the help you need. To get an idea of what UIkit is capable of, I highly recommend the [KickOff starter templates](https://zzseba78.github.io/Kick-Off/) for inspiration. 

To start customising UIkit to your own needs, take a look in [app.scss](src/Presets/uikit-stubs/app.scss). In there, you will find the standard UIkit imports, and by way of a simple example, I've changed the default blue primary colour to a nice purple shade, just to show what's possible in almost no time at all. Try changing it to another colour, and then running `npm run dev` to rebuild the CSS, and see the changes to your site.

### Handy tip

Whilst developing your site, running Laravel Mix in watch mode makes it easy to make changes and quickly see their results:

```
npm run watch
```

## Deployment

When deploying to a live server, remember to build your assets in production mode for smaller, faster downloads:
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
