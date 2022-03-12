<?php

namespace Ibra\MagicForms;

use Exception;

class MagicFormsBladeDirectives
{
    public static function magicFormsStyles()
    {
        return self::loadAsset("css");
    }

    public static function magicFormsScripts()
    {
        return self::loadAsset("js");
    }

    private static function loadAsset($type)
    {
        if (!file_exists("vendor/magicforms/$type")) {
            throw new Exception("You must publish assstes first");
        }
        $src = asset("vendor/magicforms/$type/magicforms.$type");
        if ($type == 'css') {
            return "<link rel='stylesheet' href='$src'></link>";
        } elseif ($type == 'js') {
            return "<script type='text/javascript' src='$src'></script>";
        }
    }
}
