<?php

namespace DropMusic\Dropbox;

use Dropbox\Client;

class DropboxFactory
{
    public static function make($accessToken)
    {
        return new Client($accessToken, 'DropMusic/1.0');
    }
}