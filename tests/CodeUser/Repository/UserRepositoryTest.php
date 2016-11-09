<?php

namespace CodePress\CodeUser\Tests;

use CodePress\CodeUser\Event\UserCreatedEvent;
use CodePress\CodeUser\Repository\UserRepositoryEloquent;
use CodePress\CodeUser\Repository\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Mockery as m;

class UserRepositoryTest extends AbstractTestCase{

    /**
     * @var UserRepositoryInterface
     */
    private $repository;

    public function setUp()
    {
        parent::setUp();
        $this->migrate();
        $this->repository = new UserRepositoryEloquent();
    }

    public function test_can_create_user()
    {
        // supose that events trigger, do not realy send email
        // PREVENTING
        /*1) CodePress\CodeUser\Tests\UserRepositoryTest::test_can_create_user
        InvalidArgumentException: View [email.registration] not found.*/

    $this->expectsEvents(UserCreatedEvent::class);
        $user = $this->repository->create([
            'name' => 'Test',
            'email' => 'teste@teste.com',
            'password' => '123456'
        ]);
        $this->assertEquals('Test', $user->name);
        $this->assertEquals('teste@teste.com', $user->email);
        $this->assertTrue(Hash::check('123456', $user->password));
    }

}