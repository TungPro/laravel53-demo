<?php

namespace MyTasks;
use Rocketeer\Abstracts\AbstractTask;


class SyncSharedFolder extends AbstractTask
{
	protected $local = true;

    protected $description = 'Set up the remote server for deployment';
    public function execute()
    {
        $release = $this->releasesManager->getNextRelease();

        $this->steps()->syncSharedFolders();
        if (!$this->runSteps()) {
            return $this->halt();
        }
    }
}