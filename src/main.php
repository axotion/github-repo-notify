<?php

namespace App;

use App\GithubApi\GithubApi;
use App\Utils\RepoHistoryManager;

require "../vendor/autoload.php";

const HISTORY_FILE = "history.txt";

$githubApi = new GithubApi();
$repoHistoryManager = new RepoHistoryManager();

$repoHistoryManager->checkIfHistoryFileExists(HISTORY_FILE);

$old_history_file = file_get_contents(HISTORY_FILE);
$new_history_github_stamp = null;


$result = $githubApi->getRepositoryChanges(['repository' => '', 'owner_of_repository' => '']);
foreach ($result as $key => $value) {
    if ($value->type == "PushEvent") {
        $new_history_github_stamp .= $value->id;
    }
}
var_dump($repoHistoryManager->checkIfFileHistoryNeedUpdate($old_history_file, $new_history_github_stamp, HISTORY_FILE));
