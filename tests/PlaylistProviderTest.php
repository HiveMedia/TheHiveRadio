<?php

class PlaylistProviderTest extends TestCase {

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



}