<?php
namespace App\Ultilities;
class StatusApply
{
    private $wating = "Waiting";
    private $accept = "Accept";
    private $deny = "Deny";
    private $consider = "Consider";

    public function getWaiting()
    {
        return $this->wating;
    }
    public function getAccept()
    {
        return $this->accept;
    }

    public function getDeny()
    {
        return $this->deny;
    }
    public function getConsider()
    {
        return $this->consider;
    }
}