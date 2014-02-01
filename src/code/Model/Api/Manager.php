<?php
/**
 * Just a container for Jh_RemoteLogger_Model_Api_Interface instances
 * Class Magehack_RemoteLogger_Model_Manager
 */
class Magehack_RemoteLogger_Model_Api_Manager
{
    /**
     * Array of adapters
     * @var null
     */
    protected $adapters = array();


    public function __construct() {

    }

    /**
     * @param Magehack_RemoteLogger_Model_Data_Object $data
     */
    public function report(Magehack_RemoteLogger_Model_Data_Object $data)
    {
        foreach ($this->adapters as $adapter) {
            $status = $adapter->send($data);
        }
    }

    /**
     * @param Jh_RemoteLogger_Model_Api_Interface $adapter
     */
    public function add(Jh_RemoteLogger_Model_Api_Interface $adapter){
        $this->adapters[] = $adapter;
    }
}