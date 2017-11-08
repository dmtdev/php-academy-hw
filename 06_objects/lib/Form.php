<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03.11.2017
 * Time: 15:22
 */

class Form
{

    private $rules = [
        'open' => [
            'tag' => 'form',
        ],
        'input' => [
            'tag' => 'input',
        ],
        'password' => [
            'tag' => 'input',
        ],
        'submit' => [
            'tag' => 'input',
        ],
        'textarea' => [
            'tag' => 'textarea',
        ],
    ];

    public function open($data)
    {
        return $this->parseData($data);
    }

    public function input($data)
    {

        return $this->parseData($data);
    }

    public function password($data)
    {
        return $this->parseData($data);
    }

    public function textarea($data)
    {
        return $this->parseData($data);
    }

    public function submit($data)
    {
        return $this->parseData($data);
    }

    public function close()
    {
        return $this->parseData();
    }

    private function parseData($data = [])
    {
        $caller = debug_backtrace()[1]['function'];
        switch ($caller) {
            case 'open':
            case 'input':
                $result = '<' . $this->rules[$caller]['tag'] . ' ' . $this->makeOptions($data) . '>';
                break;
            case 'close':
                $result = '</form>';
                break;
            case 'textarea':
                $value = $data['value'];
                unset($data['value']);
                $result = '<' . $this->rules[$caller]['tag'] . ' ' . $this->makeOptions($data) . '>' . $value . '</' . $this->rules[$caller]['tag'] . '>';
                break;
            default:
                $data['type'] = $caller;
                $result = '<' . $this->rules[$caller]['tag'] . ' ' . $this->makeOptions($data) . '>';
        }
        return $result;
    }

    private function makeOptions($data)
    {
        $options = '';
        foreach ($data as $k => $v) {
            $options .= '' . $k . '="' . $v . '" ';
        }
        return trim($options);
    }
}


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