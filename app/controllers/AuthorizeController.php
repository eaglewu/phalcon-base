<?php

/**
 * phalcon-base.
 * Description:
 * Author: eagle
 * Date: 2015/04/10
 */
use App\Library\SocialLogin\SocialLogin;

class AuthorizeController extends ControllerBase
{

    public function registerAction()
    {

    }

    public function loginAction()
    {

    }

    /**
     * QQ登录
     */
    public function qqloginAction()
    {
        $config = $this->config->socialLogin->qq->toArray();
        SocialLogin::init(SocialLogin::SERVICE_QQ, $config)->login();
        $this->view->disable();
    }

    /**
     * QQ登录回调
     */
    public function qqcallbackAction()
    {
        $this->view->disable();
    }

    /**
     * 新浪微博登录
     */
    public function sinaloginAction()
    {
        $config = $this->config->socialLogin->sina->toArray();
        SocialLogin::init(SocialLogin::SERVICE_SINA, $config)->login();
        $this->view->disable();
    }

    /**
     * 新浪微博回调
     */
    public function sinacallbackAction()
    {
        $config = $this->config->socialLogin->sina->toArray();
        $service = SocialLogin::init(SocialLogin::SERVICE_SINA, $config);

        $errorStr = '';
        if ($service->callback()) {
            $userinfo = $service->getUserinfo($service->accessToken, $service->uid);
            if ($userinfo['error_code'] == 0) {
                //Todo: doLogin


                $this->view->render('authorize', 'social_success');
            } else {
                $errorStr = $userinfo['error'];
                $this->view->render('authorize', 'social_failed', array('errorStr', $errorStr));
            }
        } else {
            $errorStr = "参数错误";
            $this->view->render('authorize', 'social_failed', array('errorStr', $errorStr));
        }
    }
}