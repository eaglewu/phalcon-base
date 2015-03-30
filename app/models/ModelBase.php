<?php

/**
 * phalcon-base.
 * Description: Model Base
 * User: eagle
 * Date: 2015/03/31
 * Email: 0x07de@gmail.com
 * Github: http://github.com/eaglewu
 */
abstract class ModelBase extends \Phalcon\Mvc\Model
{
    /**
     * 切换数据库连接，子类直接修改改属性即可完成切换
     * -
     * 配置名称来源 config/services.php 注入数据库连接名称
     *
     * @var string
     */
    protected $_connection = 'dbMaster';


    /**
     * 模型初始化
     * -
     * 注意: 子类覆盖此方法处理业务前/后 应使用parent::initialize();
     * 让父类执行初始化动作，否则存在各种为初始化问题
     */
    public function initialize()
    {
        //初始化指定数据库连接
        $this->setConnectionService($this->_connection);
    }

}