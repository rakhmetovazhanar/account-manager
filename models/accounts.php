<?php
require_once('config/DBConnection.php');

class Accounts {
    private $id;
    private $first_name;
    private $last_name;
    private $email;

    private $company;
    private $position;
    private $phone1;
    private $phone2;
    private $phone3;

    private $pdo;

    public function __construct($first_name="", $last_name="", $email="", $company="", $position="", $phone1="", $phone2="", $phone3="", $id=0) {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->company = $company;
        $this->position = $position;
        $this->phone1 = $phone1;
        $this->phone2 = $phone2;
        $this->phone3 = $phone3;

        $db = new DBConnection();
        $this->pdo = $db->getPdo();
    }

    public function getId() {
        return $this->$id;
    }
    public function setId($id) {
        $this->id=$id;
    }

    public function getFirstName() {
        return $this->$first_name;
    }
    public function setFirstName($first_name) {
        $this->first_name=$first_name;
    }

    public function getLastName() {
        return $this->$last_name;
    }
    public function setLastName($last_name) {
        $this->last_name=$last_name;
    }

    public function getEmail() {
        return $this->$email;
    }
    public function setEmail($email) {
        $this->email=$email;
    }

    public function getCompany() {
        return $this->$company;
    }
    public function setCompany($company) {
        $this->company=$company;
    }

    public function getPosition() {
        return $this->$position;
    }
    public function setPosition($position) {
        $this->position=$position;
    }

    public function getPhone1() {
        return $this->$phone1;
    }
    public function setPhone1($phone1) {
        $this->phone1=$phone1;
    }

    public function getPhone2() {
        return $this->$phone2;
    }
    public function setPhone2($phone2) {
        $this->phone2=$phone2;
    }

    public function getPhone3() {
        return $this->$phone3;
    }
    public function setPhone3($phone3) {
        $this->phone3=$phone3;
    }

    //добавление нового аккаунта
    public function insertData() {
        try {
            $stm = $this->pdo->prepare("INSERT INTO accounts (first_name, last_name, email, company, position, phone1, phone2, phone3) VALUES(?,?,?,?,?,?,?,?)");
            $stm->execute([$this->first_name,$this->last_name,$this->email,$this->company,$this->position,$this->phone1,$this->phone2,$this->phone3]);
        } 
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    //общее число страниц
    public function numOfPages() {
        try {
            $limit = 10;

            $stm = $this->pdo->prepare("SELECT Count(*) FROM accounts");
            $stm->execute(); 
            $countOfAcc = $stm->fetchColumn();
            $pages = ceil($countOfAcc / 10);
            //echo $pages;
            return $pages;
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }
    
    //pagination 
    public function fetchAllData($page) {
    try {
        // Количество аккаунтов на одной странице
        $limit = 10;
        //пропускаем столько значений
        $offset = ($page - 1) * $limit;

        $stm = $this->pdo->prepare("SELECT * FROM accounts LIMIT :limit OFFSET :offset");
        $stm->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stm->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e) {
        return $e->getMessage();
     }
    }

    //данные одного аккаунта
    public function fetchOneAcc() {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM accounts where id=?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch(Exception $e){
            return $e->getMessage();
        }
    }

    //изменение аккаунта
    public function updateData() {
        try {
            $stm = $this->pdo->prepare("UPDATE accounts SET first_name=?, last_name=?, email=?, company=?, position=?, phone1=?, phone2=?, phone3=? 
                                        WHERE id=?");
            $stm->execute([$this->first_name,$this->last_name,$this->email,$this->company,$this->position,$this->phone1,$this->phone2,$this->phone3,$this->id]);
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    //удаление аккаунта
    public function deleteData() {
        try {
            $stm = $this->pdo->prepare("DELETE FROM accounts WHERE id=?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch(Exception $e) {
            echo$e->getMessage();
        }
    }

}