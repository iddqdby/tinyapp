<?php


namespace test;

use TinyApp\App;


class StubDIContainer {

    private $container;


    public function __construct( $app ) {
        $this->container = [
            App::CONTROLLER_PREFIX.App::CONTROLLER_MAIN => new MockMainController( $app ),
            App::CONTROLLER_PREFIX.'ctrl' => new MockController( $app ),
            'foo_service' => new MockService(),
            'bar_parameter' => 123,
        ];
    }

    public function get( $key ) {
        return array_key_exists( $key, $this->container ) ? $this->container[ $key ] : null;
    }

}
