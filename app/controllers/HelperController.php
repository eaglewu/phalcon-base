<?php

/**
 * phalcon-base.
 * Description:
 * Author: eagle
 * Date: 2015/04/10
 */
use Phalcon\Mvc\Controller;

class HelperController extends Controller
{

    public function error404Action()
    {
        echo "404 Not Found";
    }

}