<?php

namespace Jc91715\Promote;

use Jc91715\Promote\Promote\PromoteInterface;

class PromoteManage
{
    protected $promotes=[];
    public function addPromote( PromoteInterface $promote)
    {
        array_push($this->promotes,$promote);
    }

    public function addMultiplePromote($promotes)
    {
        foreach ($promotes as $promote){
            $this->addPromote($promote);
        }
    }

    public function apply()
    {
        foreach ($this->promotes as $promote){
            $promote->apply();
        }
    }

}

