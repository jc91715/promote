<h1 align="center"> promote </h1>

<p align="center"> 促销活动.</p>


## Installing

```shell
$ composer require jc91715/promote -vvv
```

## Usage

```
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

```
输出
```
通过规则
执行行为
没通过规则
```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/jc91715/promote/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/jc91715/promote/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT