<?php
namespace People;

class Admin extends Account {
    public int $adminID;

    public function __toString()
    {
        return "Administrator ID " . $this->adminID;
    }


}