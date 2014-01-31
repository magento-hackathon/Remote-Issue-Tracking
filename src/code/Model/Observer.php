<?php
/**
 * Class Jh_RemoteLogger_Model_Observer
 */
class Jh_RemoteLogger_Model_Observer
{
    /**
     * Set the default error handler
     */
    public function setErrorHandler() {
        $manager = Mage::getModel('jh_remotelogger/manager');
        Mage::app()->setErrorHandler(array($manager, processError));
    }
}