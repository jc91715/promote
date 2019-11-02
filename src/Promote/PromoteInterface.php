<?php

namespace Jc91715\Promote\Promote;

use Jc91715\Promote\Rule\RuleInterface;
use Jc91715\Promote\Action\ActionInterface;
interface PromoteInterface
{

    public function addRule(RuleInterface $rule);
    public function addAction(ActionInterface $action);

    public function apply();
}