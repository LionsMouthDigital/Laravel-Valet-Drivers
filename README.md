# Laravel Valet Drivers
Our custom drivers for [Laravel Valet](https://laravel.com/docs/master/valet).

## Installation
1. Clone this repo in `~/.valet/Drivers`.
2. Follow any driver-specific setup instructions below.
3. Prosper.

### Statamic
This is just a tweaked version of the core Statamic driver.

#### Differences from core Statamic driver
1. Serve from folder other than root.

#### Setup
If your site is in a folder other than `{{ your_driver_path }}/html`, update `$this->dir = '/html';` accordingly.
