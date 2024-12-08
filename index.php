<?php


class IntException extends Exception {
    protected $message = 'Ошибка: ожидалось целое число (int).';
}

class FloatException extends Exception {
    protected $message = 'Ошибка: ожидалось число с плавающей запятой (float).';
}

class StringException extends Exception {
    protected $message = 'Ошибка: ожидалась строка (string).';
}

class BoolException extends Exception {
    protected $message = 'Ошибка: ожидалось булево значение (bool).';
}

class ArrayException extends Exception {
    protected $message = 'Ошибка: ожидался массив (array).';
}

class NullException extends Exception {
    protected $message = 'Ошибка: ожидался null (объект).';
}


function calculate($var) {
    if (is_int($var)) {
        return "Это целое число: $var";
    } elseif (is_float($var)) {
        throw new FloatException();
    } elseif (is_string($var)) {
        throw new StringException();
    } elseif (is_bool($var)) {
        throw new BoolException();
    } elseif (is_array($var)) {
        throw new ArrayException();
    } elseif (is_null($var)) {
        throw new NullException();
    } else {
        throw new Exception('Неизвестный тип переменной.');
    }
}


$variables = [
    42,
    3.14,
    "Hello, World!",
    true,
    [1, 2, 3],
    null,
];

foreach ($variables as $variable) {
    try {
        echo calculate($variable) . "\n";
    } catch (IntException $e) {
        echo $e->getMessage() . "\n";
    } catch (FloatException $e) {
        echo $e->getMessage() . "\n";
    } catch (StringException $e) {
        echo $e->getMessage() . "\n";
    } catch (BoolException $e) {
        echo $e->getMessage() . "\n";
    } catch (ArrayException $e) {
        echo $e->getMessage() . "\n";
    } catch (NullException $e) {
        echo $e->getMessage() . "\n";
    } catch (Exception $e) {
        echo 'Неизвестная ошибка: ' . $e->getMessage() . "\n";
    }
}
