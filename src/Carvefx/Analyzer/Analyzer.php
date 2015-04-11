<?php

namespace Carvefx\Analyzer;

use Carvefx\Analyzer\Contracts\OutputInterface;
use Carvefx\Analyzer\Contracts\ProcessListStreamInterface;

class Analyzer
{
  private $process_list;
  private $output;
  private $duration;
  private $interval;

  public function __construct(
    ProcessListStreamInterface $process_list,
    OutputInterface $output,
    $duration = 60,
    $interval = 1
  ) {
    $this->process_list = $process_list;
    $this->output = $output;
    $this->duration = $duration;
    $this->interval = $interval;
  }

  public function fire()
  {
    while ($this->duration) {
      $list = $this->process_list->get();

      foreach ($list as $item) {
        $this->output->write($item);
      }

      $this->process_list->refresh();
      $this->decreaseDuration();
    }

    $this->output->dump();
  }


  private function decreaseDuration()
  {
    $this->duration -= $this->interval;
  }
}
