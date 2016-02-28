<?php


namespace test;

use TinyApp\Controller\CLIController;


class MockController extends CLIController {


    public function argsAction( $a, $b, $c ) {
        return $a.$b.$c;
    }


    public function getAction( $key ) {
        $val = $this->get( $key );
        return [
            gettype( $val ),
            is_object( $val ) ? get_class( $val ) : null,
            is_object( $val ) ? 'object' : $val
        ];
    }

}