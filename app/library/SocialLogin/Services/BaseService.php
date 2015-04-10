<?php

/**
 * phalcon-base.
 * Description:
 * Author: eagle
 * Date: 2015/04/10
 */
namespace App\Library\SocialLogin\Services;

abstract class BaseService
{

    public $appid;
    public $appkey;
    public $callbackUrl;

    public $options = array();
    public $accessToken;
    public $uid;

    public function __construct(array $options = array())
    {
        foreach ($options as $key => $val) {
            $this->$key = $val;
        }
    }

    public function login()
    {

    }

    /**
     * @return string access_token
     */
    public function callback()
    {

    }

    /**
     * @param      $access_token
     * @param null $uid
     *
     * @return array
     */
    public function getUserinfo($access_token, $uid = NULL)
    {

    }

    public function redircet($url)
    {
        header("Location: {$url}");
    }
}