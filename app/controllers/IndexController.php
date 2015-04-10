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
        var_dump($this->config->socialLogin->sina->toArray());

        var_dump(App\Library\SocialLogin\SocialLogin::init('QQ'));

        $this->view->disable();
    }

}