<?php

namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Responses\Responses;
use Payfull\Models\User;


class SetUser extends Request {

    const TYPE = 'Set';
    const SETPARAM = 'User';

    public function __construct(Config $config)
    {
        parent::__construct($config, self::TYPE);
    }

    public function setUserInfo(User $user)
    {
        $this->params['user_op']         = $user::operation;
        $this->params['user_firstname']  = $user->getName();
        $this->params['user_lastname']   = $user->getSurname();
        $this->params['user_email']      = $user->getEmail();
        $this->params['user_phone']      = $user->getPhoneNumber();
        $this->params['user_password']   = $user->getPassword();
        $this->params['user_address']    = $user->getAddress();
        $this->params['user_company']    = $user->getCompany();
        $this->params['user_tax_number'] = $user->getTaxNumber();
        $this->params['user_tax_office'] = $user->getTaxOffice();
        $this->params['user_tc']         = $user->getTcNumber();
    }

    protected function createRequest()
    {
        $this->params['set_param']  = self::SETPARAM;
        parent::createRequest();
    }

    public function execute()
    {
        $this->createRequest();
        $response = self::send($this->endpoint,$this->params);
        return Responses::processResponse($response);
    }

}