<?php

namespace Carvefx\Analyzer\Contracts;

interface ProcessListStreamInterface
{
  public function get();
  public function refresh();
} 