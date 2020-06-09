<?php

namespace NSRosenqvist\Soma\Logger\Facades;

class Log extends \Soma\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'log';
    }
}
