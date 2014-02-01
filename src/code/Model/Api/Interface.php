<?php
/**
 * Interface Magehack_RemoteLogger_Model_Api_Interface
 */
interface Magehack_RemoteLogger_Model_Api_Interface
{
    /**
     * @param Magehack_RemoteLogger_Model_Data_Object $data
     * @return mixed
     */
    public function send(Magehack_RemoteLogger_Model_Data_Object $data);
}