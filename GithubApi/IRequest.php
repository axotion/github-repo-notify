<?php

namespace GithubApi;

interface IRequest
{
    public function method();
    public function path();
}