<?php

namespace Carvefx\Analyzer\Contracts;

interface OutputInterface
{
  public function write(array $item);

  public function dump();
} 