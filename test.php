<?php

require_once('./vendor/autoload.php');


use Jc91715\Promote\PromoteManage;
use Jc91715\Promote\Promote\AbstractPromote;
use Jc91715\Promote\Rule\abstractRule;
use Jc91715\Promote\Action\ActionInterface;


class Promote extends AbstractPromote
{

}

class Rule extends abstractRule
{

    public function across()
    {
        echo "通过规则\n";
        return true;
    }

}
class Rule1 extends abstractRule
{
    public function across()
    {
        echo "没通过规则\n";
        return false;
    }
}
class Action implements ActionInterface
{
    public function execute()
    {
        echo "执行行为\n";
    }

}
class Action1 implements ActionInterface
{

    public function execute()
    {
        echo "没有执行行为\n";
    }
}

$promote = new Promote();
$rule = new Rule();
$action = new Action();
$promote->addRule($rule);
$promote->addAction($action);



$promote1 = new Promote();
$rule1= new Rule1();
$action1 = new Action1();
$promote1->addRule($rule1);
$promote1->addAction($action1);

$promoteManage=new PromoteManage();

$promoteManage->addPromote($promote);
$promoteManage->addPromote($promote1);

$promoteManage->apply();