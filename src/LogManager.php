<?php

namespace NSRosenqvist\Soma\Logger;

use Exception;
use Monolog\Logger;
use Illuminate\Support\Arr;

class LogManager
{
    protected $channels = [];
    protected $default = '';

    public function use($name)
    {
        if (! isset($this->channels[$name])) {
            throw new Exception("Log channel hasn't been configured: ".$name);
        }

        return $this->channels[$name];
    }

    public function setDefault($name)
    {
        if (! isset($this->channels[$name])) {
            throw new Exception("Default log channel hasn't been configured: ".$name);
        }

        $this->default = $name;

        return $this;
    }

    public function getDefault()
    {
        if ($this->default) {
            return $this->use($this->default);
        } else {
            return $this->use(Arr::first($this->channels));
        }
    }

    public function register(Logger $logger, $default = false)
    {
        $name = $logger->getName();
        $this->channels[$logger->getName()] = $logger;

        if ($default) {
            $this->setDefault($name);
        }
    }

    public function __invoke($name)
    {
        return $this->use($name);
    }

    public function __call(string $method, array $parameters)
    {
        return $this->getDefault()->$method(...$parameters);
    }
}
