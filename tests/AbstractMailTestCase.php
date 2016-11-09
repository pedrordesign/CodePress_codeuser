<?php

namespace CodePress\CodeUser\Tests;

use CodePress\CodeUser\Providers\CodeUserServiceProvider;
use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Auth\Passwords\PasswordResetServiceProvider;

/**
 * Class AbstractTestCase
 * @package CodePress\CodeUser\Tests
 */
abstract class AbstractMailTestCase extends AbstractTestCase
{

    public static function setUpBeforeClass()
    {
        // exclude views folder
        self::rrmdir(__DIR__ . '/views');

        // create views folder
        mkdir(__DIR__ . '/views');
    }

    public static function tearDownAfterClass()
    {
        // exclude views folder
        self::rrmdir(__DIR__ . '/views');
    }

    public static function rrmdir($dir){
        if(is_dir($dir))
        {
            $objects = scandir($dir);
            foreach ($objects as $object)
            {
                if($object != "." && $object != "..")
                {
                    if(filetype($dir . "/" . $object) == "dir")
                    {
                        self::rrmdir($dir . "/" . $object);
                    }
                    else
                    {
                        unlink($dir . "/" . $object);
                    }
                }
            }
            rmdir($dir);
        }
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    public function getPackageProviders($app)
    {
        return [
            AuthServiceProvider::class,
            PasswordResetServiceProvider::class,
            CodeUserServiceProvider::class
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
        config([
            'app' => [
                'key' => env('462837f428374f23874f2837442837fg'),
                'cipher' => 'AES-256-CBC'
            ]
        ]);

        config(['mail' => require __DIR__ . '/config/mail.php']);
        config(['view' => require __DIR__ . '/config/view.php']);
    }
}