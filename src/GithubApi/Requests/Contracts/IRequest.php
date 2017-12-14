<?php

namespace App\GithubApi\Requests\Contracts;

interface IRequest
{
    public function method();
    public function path();
}