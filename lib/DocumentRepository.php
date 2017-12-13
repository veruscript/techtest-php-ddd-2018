<?php

namespace Veruscript\TechTest;

interface DocumentRepository
{
    public function save(Document $document);

    /**
     * @return Document[]
     */
    public function findAll();
}
