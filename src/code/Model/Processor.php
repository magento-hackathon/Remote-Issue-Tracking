<?php
/**
 * Class Magehack_RemoteLogger_Model_Processor
 */
class Magehack_RemoteLogger_Model_Processor
{
    /**
     * @var Magehack_RemoteLogger_Model_Api_Manager
     */
    protected $manager;

    /**
     * @var Magehack_RemoteLogger_Model_Data_Object
     */
    protected $data;

    public function __construct(Magehack_RemoteLogger_Model_Api_Manager $manager)
    {
        $this->manager  = $manager;
        $this->data     = new Magehack_RemoteLogger_Model_Data_Object();
    }

    /**
     * Could allow a closure to be passed in here for custom mapping og err numbers to
     * priorities to err numbers, or by preg_matching the $errstr for certain errors
     *
     * This code is just an example to get it working
     * @param $errno
     * @param $errstr
     * @param $errfile
     * @param $errline
     */
    public function processError($errno, $errstr, $errfile, $errline)
    {
        $this->data->setTitle('Error ' . $errno);
        $this->data->setContent($errstr);
        //$this->data->se

        $this->manager->report($this->data);

        //call magento default stuff
        mageCoreErrorHandler($errno, $errstr, $errfile, $errline);
    }

    /**
     * Bleh same as above
     *
     * @param Exception $e
     */
    public function processException(\Exception $e)
    {

        var_dump($e->getMessage()); die();
        $this->data->setTitle('Error ' . $e->getCode());
        $this->data->setContent($e->getMessage());

        $this->manager->report($this->data);
    }
}