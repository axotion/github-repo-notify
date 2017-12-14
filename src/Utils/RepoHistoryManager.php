<?php

namespace App\Utils;

class RepoHistoryManager
{
    public function checkIfFileHistoryNeedUpdate($old_filename, $new_githubstamp, $filename)
    {
        if ($old_filename != $new_githubstamp) {
            $this->updateHistoryFile($filename, $new_githubstamp);
            return true;
        }
        return false;
    }

    public function updateHistoryFile($filename, $new_githubstamp)
    {
        file_put_contents($filename, $new_githubstamp);
    }

    public function checkIfHistoryFileExists($filename)
    {
        if (!file_exists($filename)) {
            $this->createHistoryFile('', $filename);
        }
    }

    public function createHistoryFile($data, $filename)
    {
        file_put_contents($filename, $data);
    }
}
