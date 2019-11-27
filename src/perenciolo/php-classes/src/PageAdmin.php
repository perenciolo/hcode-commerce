<?php

namespace Perenciolo;

class PageAdmin extends Page {
  public function __construct($opts= array(), $tpl_dir = "/../src/views/admin/") {
    parent::__construct($opts, $tpl_dir);
  }
}