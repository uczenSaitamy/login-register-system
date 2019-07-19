<?php

namespace Environment;

class Environment
{

    private $env;

    public function __construct()
    {
        $this->loadFile();
        $this->loadData();
    }

    public function loadFile()
    {
        $this->env = file(ROOT . DIRECTORY_SEPARATOR . '.env');

        if (!$this->env) {
            $this->env = include(ROOT . DIRECTORY_SEPARATOR . '.env.example');
        }

        if (!$this->env) {
            throw new \Exception("Env file not found", -1);
        }
    }

    public function loadData()
    {
        foreach ($this->env as $setting) {
            putenv($setting);
        }
    }
}
