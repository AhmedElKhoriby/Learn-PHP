<?php

namespace User1;

class User {

  private $name = "ahmed";

  function getName() {
    return $this->name;
  }

  function setName($name) {
    $this->name = $name;
  }

}

