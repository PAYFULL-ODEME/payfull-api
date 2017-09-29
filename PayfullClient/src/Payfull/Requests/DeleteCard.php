<?php


namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Responses\Responses;
use Payfull\Validate;

class DeleteCard extends Request{

    const type = 'Set';
    const setParam = 'Card';
    const cardOperation = 'delete';
    private $userEmail;
    private $token;

    public function __construct(Config $config)
    {
        parent::__construct($config);
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

    protected function createRequest() {
        parent::createRequest();
        $this->params['type']           = self::type;
        $this->params['set_param']      = self::setParam;
        $this->params['card_op']        = self::cardOperation;
        $this->params['user_email']     = $this->userEmail;
        $this->params['card_token']     = $this->token;
        $this->params['hash']           = self::generateHash($this->params,$this->password);
    }

    public function execute(){
        $this->createRequest();
        $response = self::send($this->endpoint,$this->params);
        return Responses::processResponse($response);
    }

}