<?php

if (! function_exists('log')) {
    function log($level, $message, array $context = [])
    {
        return app('log')->log($level, $message, $context);
    }
}

if (! function_exists('log_debug')) {
    function log_debug($message, array $context = [])
    {
        return app('log')->debug($message, $context);
    }
}

if (! function_exists('log_info')) {
    function log_info($message, array $context = [])
    {
        return app('log')->info($message, $context);
    }
}

if (! function_exists('log_notice')) {
    function log_notice($message, array $context = [])
    {
        return app('log')->notice($message, $context);
    }
}

if (! function_exists('log_warning')) {
    function log_warning($message, array $context = [])
    {
        return app('log')->warning($message, $context);
    }
}

if (! function_exists('log_error')) {
    function log_error($message, array $context = [])
    {
        return app('log')->error($message, $context);
    }
}

if (! function_exists('log_critical')) {
    function log_critical($message, array $context = [])
    {
        return app('log')->critical($message, $context);
    }
}

if (! function_exists('log_alert')) {
    function log_alert($message, array $context = [])
    {
        return app('log')->alert($message, $context);
    }
}

if (! function_exists('log_emergency')) {
    function log_emergency($message, array $context = [])
    {
        return app('log')->emergency($message, $context);
    }
}