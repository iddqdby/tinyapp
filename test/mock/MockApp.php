<?php


namespace test;

use TinyApp\App;


class MockApp extends App {

    private $container;


    public function get( $key ) {
        return $this->container->get( $key );
    }


    protected function init() {
        $this->container = new StubDIContainer( $this );
    }

}
