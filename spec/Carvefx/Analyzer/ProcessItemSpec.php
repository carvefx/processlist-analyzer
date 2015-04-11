<?php

namespace spec\Carvefx\Analyzer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProcessItemSpec extends ObjectBehavior
{
  function it_is_initializable()
  {
    $this->shouldHaveType('Carvefx\Analyzer\ProcessItem');
  }

  function let()
  {
    $id = '1';
    $user = 'user';
    $host = 'localhost';
    $db = 'some_db';
    $command = 'Query';
    $time = '1';
    $state = 'Sending data';
    $info = 'SELECT * FROM departments';
    $this->beConstructedWith($id, $user, $host, $db, $command, $time, $state, $info);
  }

  function it_allows_access_to_properties_via_getters()
  {
    $this->getId()->shouldBe('1');
    $this->getUser()->shouldBe('user');
    $this->getHost()->shouldBe('localhost');
    $this->getDb()->shouldBe('some_db');
    $this->getCommand()->shouldBe('Query');
    $this->getTime()->shouldBe('1');
    $this->getState()->shouldBe('Sending data');
    $this->getInfo()->shouldBe('SELECT * FROM departments');
  }

  function it_generates_a_unqiue_hash_for_the_info_field()
  {
    $hash = md5($info = 'SELECT * FROM departments');
    $this->getQueryHash()->shouldBe($hash);
  }

  function it_generates_a_timestamp()
  {
    $this->getTimestamp()->shouldBeInteger();
  }
}
