<?php

namespace User2;

class User {

  private $name = "ahmed (User2)";

  function getName() {
    return $this->name;
  }

  function setName($name) {
    $this->name = $name;
  }

}

