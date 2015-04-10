<?php

/**
 * phalcon-base.
 * Description:
 * Author: eagle
 * Date: 2015/04/10
 */

namespace App\Library\SocialLogin\Services;

use App\Library\SocialLogin\Services\Sina\SaeTClientV2;
use App\Library\SocialLogin\Services\Sina\SaeTOAuthV2;

class Sina extends BaseService
{
    public function login()
    {
        $_SESSION['state'] = md5(microtime(true));
        $params = array(
            'client_id' => $this->appid,
            'redirect_uri' => $this->callbackUrl,
            'response_type' => 'code',
            'state' => $_SESSION['state'],
            'display' => 'default'
        );

        $oauth = new SaeTOAuthV2($this->appid, $this->appkey);
        $url = $oauth->authorizeURL() . "?" . http_build_query($params);
        $this->redircet($url);
    }

    public function callback()
    {
        if (isset($_REQUEST['code']) &&
            isset($_REQUEST['state'])
        ) {

            $keys = array(
                'code' => $_REQUEST['code'],
                'redirect_uri' => $this->callbackUrl
            );

            $oauth = new SaeTOAuthV2($this->appid, $this->appkey);

            if ($token = $oauth->getAccessToken('code', $keys)) {
                $this->accessToken = $token['access_token'];
                $this->uid = $token['uid'];
                return $this->accessToken;
            }
        }

        return false;
    }

    public function getUserinfo($access_token, $uid = NULL)
    {
        $client = new SaeTClientV2($this->appid, $this->appkey, $access_token);
        return $client->account_profile_basic();
    }

}