<?php
/**
 * Interface Jh_RemoteLogger_Model_Api_Interface
 */
interface Jh_RemoteLogger_Model_Api_Interface
{
    /**
     * @param Jh_RemoteLogger_Model_Data_Object $data
     * @return mixed
     */
    public function send(Jh_RemoteLogger_Model_Data_Object $data);
}