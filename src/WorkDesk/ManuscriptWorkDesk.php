<?php

namespace App\WorkDesk;

use Veruscript\TechTest\Document;
use App\Exception\ManuscriptNotReadyForPublication;
use Veruscript\TechTest\Exception\TransitionNotApplicable;
use Veruscript\TechTest\WorkDesk;
use Veruscript\TechTest\WorkingManuscript;

class ManuscriptWorkDesk implements WorkDesk
{
    public function startNew(string $title, Document $document = null): WorkingManuscript
    {
    }

    public function submit(WorkingManuscript $workingManuscript)
    {
    }

    public function revise(WorkingManuscript $workingManuscript)
    {
    }

    public function approve(WorkingManuscript $workingManuscript)
    {
    }

    /**
     * @param WorkingManuscript $workingManuscript
     */
    public function reject(WorkingManuscript $workingManuscript)
    {
    }

    /**
     * @param WorkingManuscript $workingManuscript
     *
     * @throws ManuscriptNotReadyForPublication
     */
    public function publish(WorkingManuscript $workingManuscript)
    {
        try {
            $workingManuscript->publish();
        } catch (TransitionNotApplicable $e) {
            throw new ManuscriptNotReadyForPublication("The manuscript cannot be published when currently {$e->getStatusA()}.", 0, $e);
        }
    }
}
