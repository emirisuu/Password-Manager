<?php
class Account {
    private $username;
    private $password;
    private $AES_Key;
    private $db; //database connection

    function __construct(string $username, string $encrypted_password, string $key, $db) {
        $this -> username = $username;
        $this -> password = $encrypted_password;
        $this -> AES_Key = $key;
        $this -> db = $db;
    }

    public function register_user():string {
        $query = "INSERT INTO accounts (Username, Password, AES_Key) VALUES (?, ?, ?)";
        $statement = $this -> db -> prepare($query);
        $statement -> bind_param("sss", $this->username, $this->password, $this->AES_Key);
        $statement -> execute();
        return "User succesfully registered, you can now log in.";
    }
}