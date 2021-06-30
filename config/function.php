<?php
    class Profile{
        private $_id_user;
        private $_name;
        private $_company_name;
        private $_mail;
        private $_phone;

        public function __construct( array $data)
        {
            foreach ($data as $key => $value){
                $method = 'set'.ucfirst($key);
                if (method_exists($this,$method))
                    $this->$method($value);
            }
        }

        public function id_user()
        {
            return $this->_id_user;
        }

        public function name()
        {
            return $this->_name;
        }

        public function mail()
        {
            return $this->_mail;
        }

        public function phone()
        {
            return $this->_phone;
        }

        public function setName($name)
        {
            if (is_string($name)){
                $this->_name = $name;
            }
        }

        public function setMail($mail)
        {
            if (is_string($mail))
                $this->_mail = $mail;
        }

        public function setPhone($phone)
        {
            if(is_string($phone))
                $this->_phone = $phone;
        }
    }