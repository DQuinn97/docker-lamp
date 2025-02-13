<?php

final class Dog extends Animal
{
    public function makeNoise()
    {
        return $this->name . " is barking";
    }
    public function fetch()
    {
        return $this->name . " is fetching";
    }
}
