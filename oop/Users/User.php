<?php

namespace Users;
class User {

  private $name = "ahmed-2";

  function getName() {
    return $this->name;
  }

  function setName($name) {
    $this->name = $name;
  }


}