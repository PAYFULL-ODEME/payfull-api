<?php


namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Responses\Responses;
use Payfull\Validate;

class DeleteCard extends Request{

    const TYPE = 'Set';
    const SETPARAM = 'Card';
    const CARDOPERATION = 'delete';
    private $userEmail;
    private $token;

    public function __construct(Config $config)
    {
        parent::__construct($config,self::TYPE);
    }

    public function setUserEmail($userEmail)
    {
        Validate::email($userEmail);
        $this->userEmail = $userEmail;
    }

    public function getUserEmail()
    {
        return $this->userEmail;
    }

    public function setToken($token)
    {
        Validate::token($token);
        $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }

    protected function createRequest()
    {
        $this->params['set_param']      = self::SETPARAM;
        $this->params['card_op']        = self::CARDOPERATION;
        $this->params['user_email']     = $this->userEmail;
        $this->params['card_token']     = $this->token;
        parent::createRequest();
    }

    public function execute()
    {
        $this->createRequest();
        $response = self::send($this->endpoint,$this->params);
        return Responses::processResponse($response);
    }

}