<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcb99689064a3db71c1b86b1af0683c2b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcb99689064a3db71c1b86b1af0683c2b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcb99689064a3db71c1b86b1af0683c2b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
