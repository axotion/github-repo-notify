<?php

namespace App\GithubApi\Requests;

class AbstractRequest
{

    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

}