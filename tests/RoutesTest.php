<?php

class RoutesTest extends TestCase {

    /**
     * Tests route for HTTP 200 OK
     *
     * Route: /
     *
     * @return void
     */
    public function testIndexRoute() {
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Tests route for HTTP 200 OK
     *
     * Route: /home
     *
     * @return void
     */
    public function testHomeRoute() {
        $response = $this->call('GET', 'home');

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Tests route for HTTP 200 OK
     *
     * Route: /about
     *
     * @return void
     */
    public function testAboutRoute() {
        $response = $this->call('GET', 'about');

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Tests route for HTTP 200 OK
     *
     * Route: /join
     *
     * @return void
     */
    public function testJoinRoute() {
        $response = $this->call('GET', 'join');

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Tests route for HTTP 200 OK
     *
     * Route: /staff
     *
     * @return void
     */
    public function testStaffRoute() {
        $response = $this->call('GET', 'staff');

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Tests route for HTTP 200 OK
     *
     * Route: /chat
     *
     * @return void
     */
    public function testChatRoute() {
        $response = $this->call('GET', 'chat');

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Tests route for HTTP 200 OK
     *
     * Route: /ABP
     *
     * @return void
     */
    public function testABPRoute() {
        $response = $this->call('GET', 'ABP');

        $this->assertEquals(200, $response->getStatusCode());
    }

}