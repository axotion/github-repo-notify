<?php
/**
 * Created by PhpStorm.
 * User: axotion
 * Date: 10.12.2017
 * Time: 20:34
 */

namespace GithubApi;

use GuzzleHttp\Client;

class GithubApi
{

    public $config;
    public $client;

    public function __construct($config = null)
    {
        $this->config = $config;
        $this->client = new Client();
    }

    public function getRepositoryChanges(array $data)
    {
        $request = new RepoChangesRequest($data);
        return json_decode($this->client->request($request->method(), $request->path())->getBody());

    }
}