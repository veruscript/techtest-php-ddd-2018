<?php

namespace Veruscript\TechTest;

interface WorkingManuscriptRepository
{
    /**
     * @return WorkingManuscript[]
     */
    public function findAll();

    /**
     * @param string $name
     *
     * @return WorkingManuscript
     */
    public function findOneByName(string $name): WorkingManuscript;

    /**
     * @param WorkingManuscript $manuscript
     */
    public function save(WorkingManuscript $manuscript);
}
