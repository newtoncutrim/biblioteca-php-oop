<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use App\Controllers\UserController;
use App\Services\UserService;
use App\HTTP\JsonResponse;
use App\HTTP\Request;

class UserControllerTest extends TestCase
{
    private $serviceMock;
    private $controller;

    protected function setUp(): void
    {
        $this->serviceMock = $this->createMock(UserService::class);
        $this->controller = new UserController($this->serviceMock);
    }

    private function decode(JsonResponse $response): array
    {
        return json_decode($response->data, true);
    }

    public function testIndexReturnsUsers()
    {
        $this->serviceMock
            ->method('getUsers')
            ->willReturn([['id' => 1, 'name' => 'Newton']]);

        $response = $this->controller->index();
        $data = $this->decode($response);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals([['id' => 1, 'name' => 'Newton']], $data);
        $this->assertEquals(200, $response->status);
    }

    public function testIndexReturns404WhenNoUsers()
    {
        $this->serviceMock
            ->method('getUsers')
            ->willReturn(null);

        $response = $this->controller->index();
        $data = $this->decode($response);

        $this->assertEquals([], $data);
        $this->assertEquals(404, $response->status);
    }

    public function testShowReturnsUser()
    {
        $this->serviceMock
            ->method('getUser')
            ->with(1)
            ->willReturn(['id' => 1, 'name' => 'Newton']);

        $response = $this->controller->show(1);
        $data = $this->decode($response);

        $this->assertEquals(['id' => 1, 'name' => 'Newton'], $data);
        $this->assertEquals(200, $response->status);
    }

    public function testShowReturns404IfNotFound()
    {
        $this->serviceMock
            ->method('getUser')
            ->with(1)
            ->willReturn(null);

        $response = $this->controller->show(1);
        $data = $this->decode($response);

        $this->assertEquals([], $data);
        $this->assertEquals(404, $response->status);
    }

    public function testCreateReturns201OnSuccess()
    {
        $request = $this->createMock(Request::class);
        $request->method('all')->willReturn(['name' => 'Newton']);

        $this->serviceMock
            ->method('createUser')
            ->willReturn(['id' => 1, 'name' => 'Newton']);

        $response = $this->controller->create($request);
        $data = $this->decode($response);

        $this->assertEquals(201, $response->status);
        $this->assertEquals(['id' => 1, 'name' => 'Newton'], $data);
    }

    public function testCreateReturns404WhenServiceFails()
    {
        $request = $this->createMock(Request::class);
        $request->method('all')->willReturn(['name' => 'Newton']);

        $this->serviceMock
            ->method('createUser')
            ->willReturn(null);

        $response = $this->controller->create($request);
        $data = $this->decode($response);

        $this->assertEquals(404, $response->status);
        $this->assertEquals([], $data);
    }
}
