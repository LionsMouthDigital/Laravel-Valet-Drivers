# Laravel Valet Drivers
Our custom drivers for [Laravel Valet](https://laravel.com/docs/master/valet).

## Statamic
This is just a tweaked version of the core Statamic driver.

### Differences from core Statamic driver
1. Serve from folder other than root.

### Usage
1. Save this file in `~/.valet/Drivers`.
2. If your site is in a folder other than `{{ your_driver_path }}/html`, update `$this->dir = '/html';` accordingly.
3. Prosper.
