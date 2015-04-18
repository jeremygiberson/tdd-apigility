<?php


namespace Giberson\Tdd\Apigility\Config;


use ArrayObject;

class Configuration extends ArrayObject
{
    /**
     * @param array|ArrayObject $array
     */
    public function merge($array)
    {
        $this->exchangeArray(
            array_replace_recursive(
                $this->getArrayCopy(),
                $array instanceof ArrayObject ? $array->getArrayCopy() : $array
            )
        );
    }

    public function reset()
    {
        $this->exchangeArray([]);
    }
}