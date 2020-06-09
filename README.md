# SOMA Logger

## Installation

```sh
composer require nsrosenqvist/soma-logger
```

## Usage

First register the service provider. By default configuration goes in `config/app.php`. If you want anything other than simple file logging you need to connect a Monolog handler to the SOMA exception handler (view source of `LoggerProvider.php`) or disable the built-in exception handler by setting the config value `app.catch-exceptions` to `false`.

**Example configuration:**
```php
<?php return [
    'log' => [
        'debug' => storage_path('logs/debug.log'),
        'info' => storage_path('logs/info.log'),
        'error' => storage_path('logs/error.log')
    ],
];
```

## License

MIT