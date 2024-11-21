<?php

if (! function_exists('dhl')) {
    function dhl()
    {
        return app('dhl.adapter');
    }
}