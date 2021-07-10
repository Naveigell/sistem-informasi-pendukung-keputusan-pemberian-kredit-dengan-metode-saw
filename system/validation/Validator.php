<?php
namespace System\Validation;

class Validator {
    private $messages = [];
    private $error = false;
    private $storeToSession = false;

    public function messages()
    {
        return $this->messages;
    }

    public function storeToSession($value = false)
    {
        $this->storeToSession = $value;
    }

    /**
     * Check if validation has an error
     *
     * @return bool
     */
    public function success()
    {
        return !$this->error;
    }

    /**
     * Create message and custom message if available
     *
     * @param false $condition
     * @param string $key
     * @param string $defaultMessage
     * @param string|null $customMessage
     */
    private function createMessage($condition = false, string $key, string $defaultMessage, string $customMessage = null)
    {
        if ($condition) {
            $this->error = true;
            if (!empty($this->messages[$key])) {
                array_push($this->messages[$key], $defaultMessage);
            } else {
                $this->messages[$key] = [
                    is_null($customMessage) ? $defaultMessage : $customMessage
                ];
            }

            // store to session if $storeToSession is set to TRUE
            if ($this->storeToSession) {
                $_SESSION["error-$key"] = $this->messages[$key];
            }
        }
    }

    /**
     * Create custom message, return the message if available and return NULL if not available
     *
     * @param array $data
     * @param string $key
     * @return mixed|null
     */
    private function createCustomMessage(array $data, string $key)
    {
        if (array_key_exists($key, $data)) {
            return $data[$key];
        }

        return null;
    }

    /**
     * Make a validation
     * $data is a given array to validate
     * $validation is the rules
     *
     * @param array $data
     * @param array $validations
     */
    public function make(array $data, $validations = [])
    {
        foreach ($validations as $key => $value) {
            if (empty($validations[$key]["rules"]))
                continue;

            $rules = $validations[$key]["rules"];
            $rules = explode('|', $rules);

            $messages = [];
            if (!empty($validations[$key]["messages"])) {
                $messages = $validations[$key]["messages"];
            }

            foreach ($rules as $rule) {
                $r = explode(":", $rule);
                if ($r[0] === "required" && empty($data[$key])) {
                    $this->createMessage(empty($data[$key]), $key, "$key cannot be empty", $this->createCustomMessage($messages, "required"));
                } else if (!empty($data[$key])) {
                    if ($r[0] === "min") {
                        $this->createMessage(strlen($data[$key]) < $r[1], $key, "$key minimum length is $r[1]", $this->createCustomMessage($messages, "min"));
                    } elseif ($r[0] === "max") {
                        $this->createMessage(strlen($data[$key]) > $r[1], $key, "$key maximum length is $r[1]", $this->createCustomMessage($messages, "max"));
                    } elseif ($r[0] === "integer") {
                        $this->createMessage(!is_numeric($data[$key]), $key, "$key must a number", $this->createCustomMessage($messages, "integer"));
                    } elseif ($r[0] === "digits_between") {
                        $exploded = explode(',', $r[1]);
                        $min = $exploded[0];
                        $max = $exploded[1];
                        $this->createMessage(!($data[$key] >= $min && $data[$key] <= $max), $key, "$key must be between $min and $max", $this->createCustomMessage($messages, "digits_between"));
                    } elseif ($r[0] === "in") {
                        $array      = explode(',', $r[1]);
                        $this->createMessage(!in_array($data[$key], $array), $key, "$key must be between $r[1]", $this->createCustomMessage($messages, "in"));
                    }
                }
            }
        }
    }

    /**
     * Clear all property value
     */
    public function clear()
    {
        $this->messages = [];
        $this->error = false;
    }
}