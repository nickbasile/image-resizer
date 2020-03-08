# Image Resizer

A Laravel app that resizes and optimizes images with [Spatie's image](https://github.com/spatie/image) package.

## Use Case
I have a static site for my blog, and I wanted more control over my image optimizations.

I use this app locally to optimize and resize my images before posting them.

I hope this repo helps if you're in a similar situation!

## Installation

1. Clone or fork this repo.
1. Navigate to the root directory
1. Copy `.env.example` to `.env`. Update it with your config and point it to your database.
1. Run `composer install` to install Composer dependencies.
1. Run `npm install` to install the NPM dependencies.
1. Run `php artisan key:generate` to create the app key.
1. Run `php artisan migrate` to run the migrations.
1. Run `php artisan storage:link` to [create a symbolic link](https://laravel.com/docs/7.x/filesystem#the-public-disk) between the storage and the public directories.
1. You're good to go!

## Contributing

### New Features
This app is customized to my needs. So, please fork it and make your own changes if you'd like to add functionality.

### Bugs
Please open an issue if you find a bug!

## Credits
Thank you to Spatie for their awesome [image](https://github.com/spatie/image) package!
