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
            'type' => '',
        ],
        'input' => [
            'tag' => 'input',
            'type' => 'text',
        ],
        'password' => [
            'tag' => 'input',
            'type' => 'password',
        ],
        'submit' => [
            'tag' => 'input',
            'type' => 'submit',
        ],
        'textarea' => [
            'tag' => 'textarea',
            'type' => '',
        ],
    ];

    public function open($data)
    {
        return '<form ' . $this->parseData($data) . '>';
    }

    public function input($data)
    {

        return '<input ' . $this->parseData($data) . '>';
    }

    public function password($data)
    {
        return '<input type="password" ' . $this->parseData($data) . '>';
    }

    public function textarea($data)
    {
        return $this->parseData($data, true);
    }

    public function submit($data)
    {
        return '<input type="submit" ' . $this->parseData($data) . '>';
    }

    public function close()
    {
        return '</form>';
    }

    private function parseData($data, $isTextarea = false)
    {
        $result = '';
        $caller = debug_backtrace()[1]['function'];
        if (isset($this->rules[$caller])) {
            $parseRule = $this->rules[$caller];
        }
        if (!$isTextarea) {
            foreach ($data as $k => $v) {
                $result .= '"' . $k . '"="' . $v . '" ';
            }
        } else {
            $result = '<textarea placeholder="' . $data['placeholder'] . '">' . $data['value'] . '</textarea>';
        }
        return trim($result);
    }
}
