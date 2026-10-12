<?php

class Computer {
  
  private $brand;
  private $model;
  private $processor;
  private $ram;
  private $storage;

  public function __construct($brand, $model, $processor, $ram, $storage) {
    $this->brand = $brand;
    $this->model = $model;
    $this->processor = $processor;
    $this->ram = $ram;
    $this->storage = $storage;
  }

  public function getBrand() {
    return $this->brand;
  }

  public function setBrand($brand) {
    $this->brand = $brand;
  }

  public function getModel() {
    return $this->model;
  }

  public function setModel($model) {
    $this->model = $model;
  }

  public function getProcessor() {
    return $this->processor;
  }

  public function setProcessor($processor) {
    $this->processor = $processor;
  }

  public function getRam() {
    return $this->ram;
  }

  public function setRam($ram) {
    $this->ram = $ram;
  }

  public function getStorage() {
    return $this->storage;
  }

  public function setStorage($storage) {
    $this->storage = $storage;
  }
}