<?php

namespace Library;

class nonFood
{
    public string $info;

    public function __toString(): string
    {
        return "Product Information: " . $this->info . " Flammable: ";
    }


}