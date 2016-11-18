<?php
use Phalcon\CLI\Task;

class CacheTask extends Task
{
    public function clearAction()
    {
        echo "\n" . '--------- ' . date('Y-m-d H:i:s') . "\n";

        $files = glob(ROOT . '/cache/data/model/*');
        foreach ($files as $file) {
            @unlink($file);
        }

        $files = glob(ROOT . '/cache/admin/view/*');
        foreach ($files as $file) {
            @unlink($file);
        }

        $files = glob(ROOT . '/cache/home/view/*');
        foreach ($files as $file) {
            @unlink($file);
        }

        echo 'Done';
        echo "\n" . '--------- ' . date('Y-m-d H:i:s') . "\n\n";
    }
}
