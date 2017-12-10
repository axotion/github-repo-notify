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

    public function __construct($config = null)
    {
        $this->config = $config;
    }

    public function getRepositoryChanges(array $data)
    {
        $client = new Client();
        $request = new RepoChangesRequest($data);
        return json_decode($client->request($request->method(), $request->path())->getBody());

    }
}