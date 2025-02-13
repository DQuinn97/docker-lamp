<?php

class Animal
{
    public $name;
    public $is_extinct;
    public $species;
    private $allowed_species = ["mammal", "bird", "reptile", "fish", "amphibian", "insect"];

    public function __construct(String $name, String $species, bool $is_extinct = false)
    {
        $this->name = $name;
        $this->is_extinct = $is_extinct;
        $this->setSpecies($species);
    }

    public function getName()
    {
        return $this->name;
    }
    public function getSpecies()
    {
        return $this->species;
    }
    public function getIsExtinct()
    {
        return $this->is_extinct;
    }
    public function setName(String $name)
    {
        $this->name = $name;
    }
    public function setSpecies(String $species)
    {
        $this->species = $this->getValidSpecies($species);
    }
    public function setIsExtinct(bool $is_extinct)
    {
        $this->is_extinct = $is_extinct;
    }

    private function getValidSpecies(String $species): bool
    {
        return in_array($species, $this->allowed_species) ? $species : null;
    }

    public function move()
    {
        return $this->getName() . " is moving";
    }
    public function makeNoise()
    {
        if ($this->getIsExtinct()) return $this->getName() . " is too dead to make noise";
        return $this->getName() . " is making a noise";
    }
}
