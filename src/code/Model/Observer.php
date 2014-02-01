<?php
/**
 * Class Magehack_RemoteLogger_Model_Observer
 */
class Magehack_RemoteLogger_Model_Observer
{
    /**
     * Set the default error handler
     */
    public function setErrorHandler(Varien_Event_Observer $e)
    {
        $manager    = Mage::getModel('magehack_remotelogger/api_manager');
        $processor  = Mage::getModel('magehack_remotelogger/processor', $manager);
        set_error_handler(array($processor, 'processError'));
    }

    /**
     * @param Varien_Event_Observer $e
     */
    public function setExceptionHandler(Varien_Event_Observer $e) {
        $manager    = Mage::getModel('magehack_remotelogger/api_manager');
        $processor  = Mage::getModel('magehack_remotelogger/processor', $manager);
        $processor->processException($e);
    }
}