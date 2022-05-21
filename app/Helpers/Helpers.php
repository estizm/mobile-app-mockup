<?php

if (!function_exists('googleMockup')) {
    function googleMockup(String $receipt): string
    {
        return substr($receipt, '-1') % 2;
    }

    function iosMockup(String $receipt): string
    {
        return substr($receipt, '-1') % 2;
    }
}
