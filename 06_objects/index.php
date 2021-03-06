<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03.11.2017
 * Time: 11:10
 */
ob_start();
echo '<pre>';
spl_autoload_register(function ($name) {
    include_once 'lib/' . $name . '.php';
});

$t11 = new Task1();
$t12 = new Task1();

$t11->name = 'Ivan';
$t11->age = 25;
$t11->salary = 1000;

$t12->name = 'Den';
$t12->age = 30;
$t12->salary = 2000;

echo 'salaries sum: ' . ($t11->salary + $t12->salary) . PHP_EOL . PHP_EOL;

$t1 = new Task2();
$t2 = new Task2();

$t1->setName('ivan');
$t1->setAge(25);
$t1->setSalary(1000);

$t2->setName('den');
$t2->setAge(30);
$t2->setSalary(2000);

echo 'salaries sum: ' . ($t1->getSalary() + $t2->getSalary()) . PHP_EOL;
echo 'ages sum: ' . ($t1->getAge() + $t2->getAge()) . PHP_EOL . PHP_EOL;

$t3 = new Task3();
$t3->setAge(10);
echo $t3->getAge() . PHP_EOL;
$t3->setAge(150);
echo $t3->getAge() . PHP_EOL . PHP_EOL;

$t4 = new Task4('Dima', 25, 20000);
echo 'multiply: ' . $t4->getAge() * $t4->getSalary() . PHP_EOL . PHP_EOL;

$w1 = new Worker('ivan', 25, 1000);
$w2 = new Worker('vasya', 26, 2000);
echo 'salaries sum: ' . ($w1->getSalary() + $w2->getSalary()) . PHP_EOL . PHP_EOL;


$form = new Form();
echo $form->open(['action' => 'index.php', 'method' => 'POST']);
//Код выше выведет <form action="index.php" method="POST">

echo $form->input(['type' => 'text', 'value' => '!!!']);
//Код выше выведет <input type="text" value="!!!">

echo $form->password(['value' => '!!!']);
//Код выше выведет <input type="password" value="!!!">

echo $form->submit(['value' => 'go']);
//Код выше выведет <input type="submit" value="go">

echo $form->textarea(['placeholder' => '123', 'value' => '!!!']);
//Код выше выведет <textarea placeholder="123">!!!</textarea>

echo $form->close();
//Код выше выведет </form>


$s = new Session();
$s->setVar('name', 'value');
echo $s->getVar('name');
$s->setVar('name2', 'value2');
var_dump($_SESSION);
$s->delVar('name');
var_dump($_SESSION);
var_dump($s->isSetVar('name'));

echo ob_get_clean();

//print_r ( get_declared_classes ()) ;
$class = new ReflectionClass('Form');
$methods = $class->getMethods();
var_dump($methods);
foreach ($methods as $method) {
    var_dump($method->getParameters());
}

