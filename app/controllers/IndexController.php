<?php

/**
 * phalcon-base.
 * Description: Index Controller
 * User: eagle
 * Date: 2015/03/31
 * Email: 0x07de@gmail.com
 * Github: http://github.com/eaglewu
 */
class IndexController extends ControllerBase
{

    public function indexAction()
    {

        foreach (User::find() as $user) {
            echo $user->Host . PHP_EOL;
        }

        $this->view->disable();
    }

}