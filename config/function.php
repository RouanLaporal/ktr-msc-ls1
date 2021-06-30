<?php
    class Profile{
        private $_id_user;
        private $_name;
        private $_company_name;
        private $_mail;
        private $_phone;
        private $_password;

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
        public function companyName()
        {
            return $this->_company_name;
        }

        public function mail()
        {
            return $this->_mail;
        }

        public function phone()
        {
            return $this->_phone;
        }
        public function password()
        {
            return $this->_password;
        }

        public function setName($name)
        {
            if (is_string($name)){
                $this->_name = $name;
            }
        }
        public function setCompany_Name($company_name)
        {
            if (is_string($company_name)){
                $this->_company_name = $company_name;
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
        public function setPassword($password)
        {
            if(is_string($password))
                $this->_password = $password;
        }
    }
    
    class Card{
        private $_id_card;
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

        public function id_card()
        {
            return $this->_id_card;
        }

        public function name()
        {
            return $this->_name;
        }
        public function company_name()
        {
            return $this->_company_name;
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
        public function setCompanyName($company_name)
        {
            if (is_string($company_name)){
                $this->_company_name = $company_name;
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
    class Manager{
        private $_pdo;

        public function __construct($pdo)
        {
            $this->setDb($pdo);
        }

        public function setDb( PDO $pdo){
            $this->_pdo = $pdo;
        }

        public function connect($name, $password){
            $stmt = $this->_pdo->prepare('SELECT password FROM profil WHERE name = :name');
            $stmt->bindValue(':name', $name);
            $stmt->execute();
            $result = $stmt->fetch();
            $result = $result['password'];
            return password_verify($password,$result);
        }

        public function addUser(Profile $profil){
            $profil->setPassword(password_hash($profil->password(),PASSWORD_DEFAULT));//on crypte notre mdp puis on le mets à jour dans notre objet profil.
            $stmt = $this->_pdo->prepare('INSERT INTO profil (name,company_name,mail,phone,password) VALUES(?,?,?,?,?)');
            $stmt -> execute(array(
                $profil->name(),
                $profil->companyName(),
                $profil->mail(),
                $profil->phone(),
                $profil->password()
            ));
        }

        function getUser($name){
            $stmt = $this->_pdo->prepare('SELECT * FROM profil WHERE name = :name');
            $stmt -> bindParam(':name', $name);
            $stmt -> execute();
            $result = $stmt->fetch();
            return new Profile($result);
        }

        public function addCard(Card $card){
            $stmt = $this->_pdo->prepare('INSERT INTO card (name,company_name,mail,phone) VALUES(?,?,?,?)');
            $stmt -> execute(array(
                $card->name(),
                $card->company_name(),
                $card->mail(),
                $card->phone()
            ));
        }
        function getCard($name){
            $stmt = $this->_pdo->prepare('SELECT * FROM card WHERE name = :name');
            $stmt -> bindParam(':name', $name);
            $stmt -> execute();
            $result = $stmt->fetch(); 
            return new Card($result);
        }
    }