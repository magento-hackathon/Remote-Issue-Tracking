<?php
/**
 * Class Magehack_RemoteLogger_Model_Manager
 */
class Magehack_RemoteLogger_Model_Manager
{
    /**
     * Array of adapters
     * @var null
     */
    protected $adapters = array();

    /**
     * Loop through adapters on construct
     */
    public function __construct() {

    }

    /**
     * @param $errno
     * @param $errstr
     * @param $errfile
     * @param $errline
     */
    public function processError($errno, $errstr, $errfile, $errline) {

        $error = array(
            'message'       => $errstr,
            'error_no'      => $errno,
            'error_file'    => $errfile,
            'error_line'    => $errline
        );

        $errorObject = Mage::getModel('jh_remotelogger/data_object');
        $errorObject->add($error);

        foreach ($this->adapters as $adapter) {
            $adapter->send();
        }

        mageCoreErrorHandler($errno, $errstr, $errfile, $errline);
    }

    public function add(Jh_RemoteLogger_Model_Api_Interface $adapter){
        $this->adapters[] = $adapter;
    }
}