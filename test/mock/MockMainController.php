<?php


namespace test;

use TinyApp\Controller\CLIController;


class MockMainController extends CLIController {

    public function defaultAction( $line ) {
        echo $line."\n";
    }

}