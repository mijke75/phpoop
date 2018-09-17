<?php
    // Database inherits from DbSettings. This class contains the database connection settings
    // Purpose is to be able to change the settings for another project or be able to update the database class without breaking code

    class DbSettings {

        protected $server;
        protected $username;
        protected $password;
        protected $database;

        public function __construct()
        {
            switch ($_SERVER['HTTP_HOST']) {
                case "localhost":
                    $this->server = 'localhost';
                    $this->username = 'root';
                    $this->password = 'root';
                    $this->database = 'phpoop';
                    break;

                case "staging.website.com":
                    $this->server = 'localhost';
                    $this->username = 'staging';
                    $this->password = 'staging password';
                    $this->database = 'phpoop';
                    break;

                case "live.website.com":
                    $this->server = 'localhost';
                    $this->username = 'live';
                    $this->password = 'live password';
                    $this->database = 'phpoop';
                    break;

                default:
                    $this->server = 'localhost';
                    $this->username = 'root';
                    $this->password = 'root';
                    $this->database = 'phpoop';
            }
        }

    }
?>