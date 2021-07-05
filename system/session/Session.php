<?php
namespace System\Session;

class Session {
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function setMultiple($data = [])
    {

    }

    public function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public function get($key, $default = null)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return $default;
    }

    public function forget($key)
    {
        unset($_SESSION[$key]);
    }

    public function all()
    {
        return $_SESSION;
    }

    public function destroy()
    {
        session_destroy();
    }
}