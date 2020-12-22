<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitccdbd118d0e50f8e1062c53518654d37
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitccdbd118d0e50f8e1062c53518654d37::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitccdbd118d0e50f8e1062c53518654d37::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitccdbd118d0e50f8e1062c53518654d37::$classMap;

        }, null, ClassLoader::class);
    }
}