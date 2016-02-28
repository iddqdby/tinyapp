<?php

use test\MockApp;


class AppTest extends PHPUnit_Framework_TestCase {


    public function testInit() {
        $app = new MockApp();
        return $app;
    }


    /**
     * @depends testInit
     */
    public function testAction( $app ) {
        $this->assertEquals( 'foobarbaz', $app->run( 'ctrl:args', [ 'foo', 'bar', 'baz' ] ) );
    }


    /**
     * @depends testInit
     */
    public function testStdout( $app ) {
        $this->expectOutputString( "line\n" );
        $app->run( 'default', [ 'line' ] );
    }


    /**
     * @dataProvider providerKeys
     * @depends testInit
     */
    public function testGet( $key, $type, $class, $val, $app ) {
        $result = $app->run( 'ctrl:get', [ $key ] );
        $this->assertEquals( [ $type, $class, $val ], $result );
    }


    /**
     * @dataProvider providerInvalidActions
     * @depends testInit
     * @expectedException BadMethodCallException
     * @expectedExceptionMessageRegExp /Action "[\w\d_]+" of controller "[\w\d_]+" does not exist/
     */
    public function testActionNotFound( $action, $app ) {
        $app->run( $action );
    }


    public function providerKeys() {
        return [
            'service' => [ 'foo_service', 'object', 'test\\MockService', 'object' ],
            'parameter' => [ 'bar_parameter', 'integer', null, 123 ],
            'null' => [ 'nonexistent', 'NULL', null, null ],
        ];
    }


    public function providerInvalidActions() {
        return [
            'invalid_controller' => [ 'nonexistent:test' ],
            'invalid_action' => [ 'ctrl:none' ],
            'main_controller_invalid_action' => [ 'none' ]
        ];
    }

}
