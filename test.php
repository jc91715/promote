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
        echo "通过规则，购A\n";
        return true;
    }

}

class Rule1 extends abstractRule
{
    public function across()
    {
        echo "没通过规则，打八折\n";
        return true;
    }

    public function execute()
    {
        echo "执行行为，订单打八折\n";
    }
}
class Action implements ActionInterface
{
    public function execute()
    {
        echo "执行行为，赠B\n";
    }

}

//特殊规则Rule和Action分离
$promote = new Promote();
$rule = new Rule();
$action = new Action();
$promote->addRule($rule);
$promote->addAction($action);



//一般规则只有Rule
$promote1 = new Promote();
$rule1= new Rule1();

$promote1->addRule($rule1);

$promoteManage=new PromoteManage();

$promoteManage->addPromote($promote);
$promoteManage->addPromote($promote1);

$promoteManage->apply();


//输出
//通过规则，购A
//执行行为，赠B
//没通过规则，打八折
//执行行为，订单打八折