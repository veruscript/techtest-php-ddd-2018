<?php

namespace Veruscript\TechTest;

use App\Exception\ManuscriptNotReadyForPublication;

interface WorkDesk
{
    public function startNew(string $name, Document $document = null): WorkingManuscript;

    public function submit(WorkingManuscript $workingManuscript);

    public function revise(WorkingManuscript $workingManuscript);

    public function approve(WorkingManuscript $workingManuscript);

    /**
     * @param WorkingManuscript $workingManuscript
     */
    public function reject(WorkingManuscript $workingManuscript);

    /**
     * @param WorkingManuscript $workingManuscript
     *
     * @throws ManuscriptNotReadyForPublication
     */
    public function publish(WorkingManuscript $workingManuscript);
}
