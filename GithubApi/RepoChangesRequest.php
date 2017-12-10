<?php

namespace GithubApi;

class RepoChangesRequest extends AbstractRequest implements IRequest {

    public $repository;
    public $owner_of_repository;

    public function method()
    {
        return 'GET';
    }

    public function path()
    {
        return 'https://api.github.com/repos/'.$this->owner_of_repository.'/'.$this->repository.'/events';
    }
}