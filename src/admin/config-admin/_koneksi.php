<?php

    class database
    {
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '';
        private $database_name = 'spdj_yegar_osmo';
        protected $conn;

        public function __construct()
        {
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->database_name);
            if (!$this->conn) {
                die('Koneksi ke database gagal!'.$this->conn->connect_error());
            }

            return $this->conn;
        }
    }