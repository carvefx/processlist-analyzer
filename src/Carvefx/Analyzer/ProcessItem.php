<?php

namespace Carvefx\Analyzer;

class ProcessItem
{
  private $id;
  private $user;
  private $host;
  private $db;
  private $command;
  private $time;
  private $state;
  private $info;

  public function __construct($id, $user, $host, $db, $command, $time, $state, $info)
  {
    $this->id = $id;
    $this->user = $user;
    $this->host = $host;
    $this->db = $db;
    $this->command = $command;
    $this->time = $time;
    $this->state = $state;
    $this->info = $info;
  }

  /**
   * @return mixed
   */
  public function getCommand()
  {
    return $this->command;
  }

  /**
   * @return mixed
   */
  public function getDb()
  {
    return $this->db;
  }

  /**
   * @return mixed
   */
  public function getHost()
  {
    return $this->host;
  }

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @return mixed
   */
  public function getInfo()
  {
    return $this->info;
  }

  /**
   * @return mixed
   */
  public function getState()
  {
    return $this->state;
  }

  /**
   * @return mixed
   */
  public function getTime()
  {
    return $this->time;
  }

  /**
   * @return mixed
   */
  public function getUser()
  {
    return $this->user;
  }

  public function getQueryHash()
  {
    return md5($this->info);
  }

    public function getTimestamp()
    {
      return intval(microtime(true));
    }
}

