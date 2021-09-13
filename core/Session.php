<?php

namespace app\core;

class Session
{
    private array $savedKeys;

    public function __construct()
    {
        session_start();
        $this->savedKeys = [];
    }

    public function set($key, $value)
    {
        $this->savedKeys[] = $key;
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        return $_SESSION[$key] ?? false;
    }

    public function getInt($key): int
    {
        $value = $_SESSION[$key];

        if (is_object($value)) {
            return 0;
        }

        return intval($value);
    }

    public function removeKey($key)
    {
        unset($this->savedKeys[$key]);
        unset($_SESSION[$key]);
    }

    public function removeAll()
    {
        foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
            unset($this->savedKeys[$key]);
        }
    }
}
