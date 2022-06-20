<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite3b98b352c1c1f6afe05b5b8e10a6973
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite3b98b352c1c1f6afe05b5b8e10a6973::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite3b98b352c1c1f6afe05b5b8e10a6973::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite3b98b352c1c1f6afe05b5b8e10a6973::$classMap;

        }, null, ClassLoader::class);
    }
}
