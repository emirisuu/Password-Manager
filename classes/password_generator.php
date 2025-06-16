<?php
class PasswordGenerator {
    private $lowercase_characters;
    private $uppercase_characters;
    private $numerical_characters;
    private $special_characters;

    const LOWERCASE = "abcdefghijklmnopqrstuvwxyz";
    const UPPERCASE = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const NUMERICAL = "0123456789";
    const SPECIAL = "!@#$%^&*()_";

    function __construct($lowercase, $uppercase, $numerical, $special) {
        $this -> lowercase_characters = $lowercase;
        $this -> uppercase_characters = $uppercase;
        $this -> numerical_characters = $numerical;
        $this -> special_characters = $special;
    }

    public function generate_password():string {
        $generated_password = array();
        $generated_password[] = $this -> generate(self::LOWERCASE, $this -> lowercase_characters);
        $generated_password[] = $this -> generate(self::UPPERCASE, $this -> uppercase_characters);
        $generated_password[] = $this -> generate(self::NUMERICAL, $this -> numerical_characters);
        $generated_password[] = $this -> generate(self::SPECIAL, $this -> special_characters);
        $generated_password = implode($generated_password);
        return str_shuffle($generated_password);
    }

    private function generate($character_set, $character_count):string {
        $text = "";
        for($i = 0; $i < $character_count; $i++) {
            $text .= $character_set[rand(0, strlen($character_set) - 1)];
        }
        return $text;
    }
}