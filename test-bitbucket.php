<?php
ini_set('display_errors', 1);
require 'htdocs/app/Mage.php';
Mage::app('default');

$data = new Magehack_RemoteLogger_Model_Data_Object();
$data->setContent('SHIT GONE DOWN');
$data->setTitle('Some issue yo');

$adapter = new Magehack_RemoteLogger_Model_Api_Bitbucket('jhhello', 'remote-issue-test', 'aydin@wearejh.com', 'aydinhassanwearejh');
$adapter->send($data);