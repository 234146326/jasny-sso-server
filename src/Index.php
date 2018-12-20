<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/20
 * Time: 20:05
 */

namespace Xuying\SSO;

class Index
{

    private  $mySSO;

    /**
     * Index constructor.
     * @param MySSOServer $mySSOServer
     */
    public function __construct()
    {
        $this->mySSO = new \Xuying\SSO\MySSOServer();
    }

    /**
     * 运行函数
     */
    public function run()
    {
        $command = isset($_REQUEST['command']) ? $_REQUEST['command'] : null;
        $ssoServer = $this->mySSO;
        if (!$command || !method_exists($ssoServer, $command)) {
            header("HTTP/1.1 404 Not Found");
            header('Content-type: application/json; charset=UTF-8');
            echo json_encode(['error' => 'Unknown command']);
            exit();
        }

        $result = $ssoServer->$command();
    }
}