<?php

namespace Perenciolo;

use Rain\Tpl;

class Page {
  private $tpl;
  private $options = [];
  private $defaults = [
    "data" => []
  ];

  public function __construct($opts = array()) {

    $this->options = array_merge($this->defaults, $opts);

    $config = array(
      "tpl_dir" => $_SERVER["DOCUMENT_ROOT"]."/../src/views/",
      "cache_dir" => $_SERVER["DOCUMENT_ROOT"]."/../src/views-cache/",
      "debug" => false,
    );

    Tpl::configure($config);

    $this->tpl = new Tpl;

    $this->setData($this->options["data"]);

    $this->tpl->draw("header");
  }

  private function setData($data = array()) {

    if (!$data || empty($data)) {
      return NULL;
    }

    foreach($data as $key => $value) {
      $this->tpl->assign($key, $value);
    }
  }

  public function setTpl($name, $data = array(), $returnHTML = false) {
    $this->setData($data);

    return $this->tpl->draw($name, $returnHTML);
  }

  public function __destruct() {
    $this->tpl->draw("footer");
  }
}