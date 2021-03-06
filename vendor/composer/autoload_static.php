<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2180974c74ea1081759fce337279e0a3
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Kamal\\CodeSnippet\\' => 18,
        ),
        'C' => 
        array (
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Kamal\\CodeSnippet\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2180974c74ea1081759fce337279e0a3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2180974c74ea1081759fce337279e0a3::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
