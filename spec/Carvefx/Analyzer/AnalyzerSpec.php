<?php

namespace spec\Carvefx\Analyzer;

use PhpSpec\ObjectBehavior;

use Carvefx\Analyzer\Contracts\OutputInterface;
use Carvefx\Analyzer\Contracts\ProcessListStreamInterface;

class AnalyzerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Carvefx\Analyzer\Analyzer');
    }

    function let(ProcessListStreamInterface $process_list_stream, OutputInterface $output)
    {
      $duration = 60;
      $interval  = 1;
      $this->beConstructedWith($process_list_stream, $output, $duration, $interval);
    }

    function it_requests_a_new_process_list_every_interval_until_duration_expires_with_default_settings(ProcessListStreamInterface $process_list_stream)
    {
      $process_list_stream->get()->willReturn($this->mockProcessList())->shouldBeCalledTimes(60);
      $process_list_stream->refresh()->shouldBeCalledTimes(60);

      $this->fire();
    }

    function it_requests_a_new_process_list_every_interval_until_duration_expires_with_custom_settings(ProcessListStreamInterface $process_list_stream, OutputInterface $output)
    {
      $this->beConstructedWith($process_list_stream, $output, 10, 5);

      $process_list_stream->get()->willReturn($this->mockProcessList())->shouldBeCalledTimes(2);
      $process_list_stream->refresh()->shouldBeCalledTimes(2);

      $this->fire();
    }



    private function mockProcessList()
    {
      $process_list = [];
      for($i = 0; $i < 10; $i++) {
        $process = new \StdClass;
        $process->id = mt_rand();
        $process->query = 'SELECT * FROM countries ORDER BY id DESC';
        $process->time = rand(1, 36);
        array_push($process_list, $process);
      }

      return $process_list;
    }
}
