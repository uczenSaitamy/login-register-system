<?php

namespace Validator;

class Validator
{
    private $patterns = [
        'email' => '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i',
        'min' => '/^\w\S{min,}+$/',
        'max' => '/^\w\S{,max}+$/',
    ];

    private $errors = [];

    private $data = [];

    private function email($value): bool
    {
        $pattern = $this->patterns['email'];
        return (bool) preg_match($pattern, $value);
    }

    private function min($value, $param): bool
    {
        return strlen($value) >= $param;
    }

    private function max($value, $param): bool
    {
        return strlen($value) <= $param;
    }

    private function same($value, $sameAs): bool
    {
        return $value === $this->data[$sameAs];
    }

    private function required($value): bool
    {
        return (bool) $value;
    }

    public function validate(array $data = [], array $rules = [])
    {
        $this->data = $data;

        foreach ($rules as $name => $patterns) {
            $values = explode('|', $patterns);

            foreach ($values as $value) {
                $params = explode(':', $value);

                if (!$this->check($params[0], $data[$name], $params[1] ?? null)) {
                    $this->errors[] = $name;
                }
            }
        }
    }

    // public function check(string $rule, $value, string $additional = null)
    // {
    //     $pattern = str_replace($rule, $additional, $this->patterns[$rule]);
    //     return preg_match($pattern, $value);
    // }

    public function check(string $rule, $value, string $additional = null)
    {
        if ($additional) {
            return $this->{$rule}($value, $additional);
        } else {
            return $this->{$rule}($value);
        }
    }

    public function isError(): bool
    {
        return (bool) count($this->errors);
    }
}
