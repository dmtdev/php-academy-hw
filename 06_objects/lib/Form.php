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

//    public function open($data)
//    {
//        return $this->parseData($data);
//    }
//
//    public function input($data)
//    {
//
//        return $this->parseData($data);
//    }
//
//    public function password($data)
//    {
//        return $this->parseData($data);
//    }
//
//    public function textarea($data)
//    {
//        return $this->parseData($data);
//    }
//
//    public function submit($data)
//    {
//        return $this->parseData($data);
//    }
//
//    public function close()
//    {
//        return $this->parseData();
//    }
    public function __call($caller, $arguments)
    {
        $data = count($arguments)?$arguments[0]:false;

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

//    private function parseData($data = [])
//    {
//        $caller = debug_backtrace()[1]['function'];
//
//    }

    private function makeOptions($data)
    {
        $options = '';
        foreach ($data as $k => $v) {
            $options .= '' . $k . '="' . $v . '" ';
        }
        return trim($options);
    }
}