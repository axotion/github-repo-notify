<?php

require "vendor/autoload.php";

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require_once('' . $class . '.php');
});

use GithubApi\GithubApi;

$githubApi = new GithubApi();

while (true) {
    //Determine how often script call api
    sleep(60);
    $result = $githubApi->getRepositoryChanges(['repository' => '', 'owner_of_repository' => '']);

    if (!file_exists('history.txt')) {
        file_put_contents('history.txt', '');
    }

    $old_history_file = (file_get_contents('history.txt'));
    $new_history = null;

    foreach ($result as $key => $value) {
        if ($value->type == "PushEvent") {
            $new_history .= $value->id;
        }
    }

    if (empty($old_history_file) || $old_history_file != $new_history) {
        file_put_contents('history.txt', $new_history);
        echo 'Updated' . PHP_EOL;
//        Do whatever you want here (git pull or something)
    } else {
        echo 'No changes' . PHP_EOL;
    }
}





