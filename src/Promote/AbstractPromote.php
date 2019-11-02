<?php
namespace Jc91715\Promote\Promote;

use Jc91715\Promote\Rule\RuleInterface;
use Jc91715\Promote\Action\ActionInterface;

abstract  class AbstractPromote implements PromoteInterface
{
    protected $rule;
    protected $action;
    public function addRule(RuleInterface $rule){
        $this->rule = $rule;
    }
    public function addAction(ActionInterface $action)
    {
        $this->action = $action;

    }
    public function apply()
    {

        if($this->rule){
            if($this->rule->across()){
                if($this->action){
                    $this->action->execute();
                }else{
                    $this->rule->execute();
                }
            }
        }

    }

}