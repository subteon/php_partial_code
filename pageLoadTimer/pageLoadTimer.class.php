<?php

/*
 *
 * Page Load Timer Class
 * pageLoadTimer.class.php
 * PHP 5.x over
 *
*/

class pageLoadTimer
{

    public $start = 0;

    public function __construct(){
        $now_time_count = $this->getNowTime();
        $this->start = $now_time_count;
    }

    private function getNowTime(){
        return microtime(true);
    }

    public function getTime(){

        $now_time_count = $this->getNowTime();

        $running_time = ($now_time_count - $this->start);

        return $running_time;

    }

}
