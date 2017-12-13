<?php

namespace Veruscript\TechTest;

use Veruscript\TechTest\Exception\TransitionNotApplicable;

interface WorkingManuscript
{
    public function getName(): string;

    public function getDocument(): Document;

    /**
     * @param string $status - One of 'drafted', 'submitted', 'approved' or 'published'.
     */
    public function setStatus(string $status);

    /**
     * @return string
     */
    public function getStatus(): string;

    /**
     * @return int
     */
    public function getMajorVersion(): int;

    /**
     * @return int
     */
    public function getMinorVersion(): int;

    /**
     * @return bool - True is the status is published.
     */
    public function isPublished(): bool;

    /**
     * Sets the status to 'published' if approved and increments a new major version.
     *
     * @throws TransitionNotApplicable if attempting to publish when not already approved.
     */
    public function publish();

    /**
     * Sets the status to 'drafted' if not approved and increments a new minor version.
     */
    public function revise();
}
