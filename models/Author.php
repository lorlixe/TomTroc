<?php

/**
 * Entité Author, un auteur est défini par le champ
 * name
 */
class Author extends AbstractEntity
{
    private string $name = "";


    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }
}
