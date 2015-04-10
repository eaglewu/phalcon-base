<?php

/**
 * phalcon-base.
 * Description:
 * Author: eagle
 * Date: 2015/04/10
 */
namespace App\Library\SocialLogin;

class SocialLogin
{
    const  SERVICE_QQ = 'QQ';
    const  SERVICE_SINA = 'Sina';

    /**
     * @param       $serviceName
     * @param array $extra
     *
     * @return Services\BaseService
     * @throws \Exception
     */
    public static function init($serviceName, $extra = array())
    {
        $className = __NAMESPACE__ . '\\Services\\' . ucfirst($serviceName);
        if (class_exists($className)) {
            return new $className($extra);
        } else {
            throw new \Exception("Scoial Service <$className> not found.");
        }
    }

}