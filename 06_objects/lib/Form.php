<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03.11.2017
 * Time: 15:22
 */

class Form
{
    public function open($data)
    {
        checkArray($data);
        return ;
    }

    public function input($data)
    {
        checkArray($data);
        return ;
    }

    public function password($data)
    {
        checkArray($data);
        return ;
    }

    public function textarea($data)
    {
        checkArray($data);
        return ;
    }

    public function submit($data)
    {
        checkArray($data);
        return ;
    }

    public function close()
    {
        return '</form>';
    }
    private function checkArray($array){

    }
}