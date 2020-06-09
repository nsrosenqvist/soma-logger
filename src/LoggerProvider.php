<?php

namespace NSRosenqvist\Soma\Logger;

use Exception;
use Soma\ServiceProvider;
use Psr\Container\ContainerInterface;

use DateTimeZone;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use NSRosenqvist\Soma\Logger\LogManager;

class LoggerProvider extends ServiceProvider
{
    public function getFactories() : array
    {
        return [
            'log' => function(ContainerInterface $c) {
                $whoops = $c->get('app')->getExceptionHandler();
                $manager = new LogManager();

                if ($logs = config('app.log', [])) {
                    $logger = new Logger('soma');
                    $timezone = new DateTimeZone(config('app.timezone', @date_default_timezone_get()));
                    
                    $logger->setTimezone($timezone);

                    foreach ($logs as $level => $path) {
                        $level = constant(Logger::class.'::'.strtoupper($level));
                        $logger->pushHandler(new StreamHandler($path, $level));
                    }

                    $whoops->pushHandler(function ($exception, $inspector, $run) use ($logger) {
                        $logger->error($exception->getMessage());
                    });

                    $manager->register($logger, true);
                }

                return $manager;
            },
        ];
    }
}