<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24.11.2017
 * Time: 14:53
 */

abstract class Base
{
    /**
     * @return string
     */
    abstract public function getTableName(): string;

    /**
     * Метод должен вовращать поля текущей таблицы (кроме id)
     * в формате:
     * [
     *      'fieldName' => 'fieldType',
     *      'fieldName2' => 'fieldType',
     *      ...
     * ]
     *
     * @return array
     */
    abstract public function getMap(): array;


    /**
     * Этот метод вызываем перед каждым обновлением/добавлением,
     * здесь проверяем каждый элемент массива на соответствие типу из массива
     * полученного в getMap, если тип не соответствует - выбрасываем исключение.
     *
     * @param array $data
     * @return bool
     * @throws Exception
     */
    abstract protected function checkFields(array $data): bool;

    /**
     * В этом методе получаем список элементов таблицы
     * полученной из метода getTableName
     *
     * @param int|null $id
     */
    public function get(int $id = null)
    { /* Тут реализация */
    }


    /**
     * В этом методе создаем новую запись в таблице getTableName.
     * Перед созданием проверяем корректность данных вызовом метода checkFields.
     *
     * @param array $data
     */
    public function create(array $data)
    { /* Тут реализация */
    }

    /**
     * В этом методе обновляем запись в таблице getTableName.
     * Перед обновлением проверяем корректность данных вызовом метода checkFields.
     *
     * @param int $id
     * @param array $data
     */
    public function update(int $id, array $data)
    { /* Тут реализация */
    }

    /**
     * В этом методе удаляем запись в таблице getTableName по id.
     *
     * @param int $id
     */
    public function delete(int $id)
    { /* Тут реализация */
    }
}