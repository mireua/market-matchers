<?php

namespace Library;

class Food extends Products
{
    //info as in macros/calories
    public string $macros;

    public function __toString(): string
    {
        return " Macro Information: " . $this->macros;
    }


}