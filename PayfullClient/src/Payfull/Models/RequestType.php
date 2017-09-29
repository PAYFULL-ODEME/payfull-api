<?php

namespace Payfull\Models;

use Payfull\Validate;

class RequestType
{

    private $requestType;
    private $requestActionType;
    private $requestPeriod;
    private $repetitionCount;

    public function setRequestType($type)
    {
        Validate::requestType($type);
        $this->requestType = $type;
    }

    public function getRequestType()
    {
        return $this->requestType;
    }

    public function setRequestActionType($type)
    {
        Validate::requestActionType($type);
        $this->requestActionType = $type;
    }

    public function getRequestActionType()
    {
        return $this->requestActionType;
    }

    public function setRequestPeriod($period)
    {
        Validate::requestPeriod($period);
        $this->requestPeriod = $period;
    }

    public function getRequestPeriod()
    {
        return $this->requestPeriod;
    }

    public function setRepetitionCount($count)
    {
        Validate::repetitionCount($count);
        $this->repetitionCount = $count;
    }

    public function getRepetitionCount()
    {
        return $this->repetitionCount;
    }

}