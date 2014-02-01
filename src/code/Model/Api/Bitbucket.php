<?php

/**
 * Class Magehack_RemoteLogger_Model_Api_Bitbucket
 */
class Magehack_RemoteLogger_Model_Api_Bitbucket implements Magehack_RemoteLogger_Model_Api_Interface
{

    /**
     * API End Point for creating issues
     */
    const BITBUCKET_API_URL = 'https://bitbucket.org/api/1.0/repositories/%s/%s/issues';

    /**
     * @param Magehack_RemoteLogger_Model_Data_Object $data
     * @return bool
     */
    public function send(Magehack_RemoteLogger_Model_Data_Object $data)
    {

        $params = array(
            'status'    => 'new',
            'priority'  => $data->getPriority(),
            'title'     => $data->getTitle(),
            'content'   => $data->getContent(),
            'kind'      => 'bug',
        );

        $client = new Varien_Http_Client($this->getUrl());
        $client->setMethod(Zend_Http_Client::POST);
        $client->setParameterPost($params);
        $client->setAuth($this->username, $this->password);

        $response = $client->request();
        return $response->isSuccessful();
    }

    /**
     * @param string $account
     * @param string $repository
     * @param string $username
     * @param string $password
     */
    public function __construct($account, $repository, $username, $password)
    {
        $this->account      = (string) $account;
        $this->repository   = (string) $repository;
        $this->username     = (string) $username;
        $this->password     = (string) $password;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return sprintf($this::BITBUCKET_API_URL, $this->account, $this->repository);
    }
}