<?php

require_once (__DIR__.'/../database/database.php');

//session_start();
class Crud{
    private $conn;

    // Constructor
    public function __construct(){
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
      }
  
  
      // Execute queries SQL
      public function runQuery($sql){
        $stmt = $this->conn->prepare($sql);
        return $stmt;
      }
  
      // Insert to user table
      public function insert($username, $password, $fullname, $user_type, $user_department, $user_email, $epf_no, $user_national_id, $user_mobile, $user_address, $user_gender){
        try{
          $stmt = $this->conn->prepare("INSERT INTO user (username, password, fullname, user_type, user_department, user_email, epf_no, user_national_id, user_mobile,
          user_address, user_gender) VALUES(:username, :password, :fullname, :user_type, :user_department, :user_email, :epf_no, :user_national_id, :user_mobile, :user_address, :user_gender)");
          //hashing the password given by the admin (4/29/2021)
          $hash_password = password_hash($password,PASSWORD_DEFAULT);

          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":password", $hash_password);
          $stmt->bindparam(":fullname", $fullname);
          $stmt->bindparam(":user_type", $user_type);
          $stmt->bindparam(":user_department", $user_department);
          $stmt->bindparam(":user_email", $user_email);
          $stmt->bindparam(":epf_no", $epf_no);
          $stmt->bindparam(":user_national_id", $user_national_id);
          $stmt->bindparam(":user_mobile", $user_mobile);
          $stmt->bindparam(":user_address", $user_address);
          $stmt->bindparam(":user_gender", $user_gender);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          //echo $e->getMessage();
        }
      }

      // Insert to history table
      public function insertToHistory($username, $password, $fullname, $user_type, $user_department, $user_email, $epf_no, $user_national_id, $user_mobile, $user_address, $user_gender){
        try{
          $stmt = $this->conn->prepare("INSERT INTO history (username, password, fullname, user_type, user_department, user_email, epf_no, user_national_id, user_mobile,
          user_address, user_gender) VALUES(:username, :password, :fullname, :user_type, :user_department, :user_email, :epf_no, :user_national_id, :user_mobile, :user_address, :user_gender)");
          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":password", $password);
          $stmt->bindparam(":fullname", $fullname);
          $stmt->bindparam(":user_type", $user_type);
          $stmt->bindparam(":user_department", $user_department);
          $stmt->bindparam(":user_email", $user_email);
          $stmt->bindparam(":epf_no", $epf_no);
          $stmt->bindparam(":user_national_id", $user_national_id);
          $stmt->bindparam(":user_mobile", $user_mobile);
          $stmt->bindparam(":user_address", $user_address);
          $stmt->bindparam(":user_gender", $user_gender);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          //echo $e->getMessage();
          
           
        }
      }
  
  
      // Update for all users
      public function allUpdate($fullname,$user_email,$epf_no,$user_national_id, $user_mobile, $user_address,$user_gender, $username){
          try{
            $stmt = $this->conn->prepare("UPDATE user SET fullname = :fullname , user_email = :user_email, epf_no = :epf_no, user_national_id = :user_national_id, 
            user_mobile = :user_mobile, user_address = :user_address, user_gender = :user_gender WHERE username = :username");
            $stmt->bindparam(":fullname", $fullname);
            $stmt->bindparam(":user_email", $user_email);
            $stmt->bindparam(":epf_no", $epf_no);
            $stmt->bindparam(":user_national_id", $user_national_id);
            $stmt->bindparam(":user_mobile", $user_mobile);
            $stmt->bindparam(":user_address", $user_address);
            $stmt->bindparam(":user_gender", $user_gender);
            $stmt->bindparam(":username", $username);
            $stmt->execute();
            return $stmt;
          }catch(PDOException $e){
            echo $e->getMessage();
          }
      }
  
      //update for admin
      public function adminUpdate($username, $fullname, $user_type, $user_department, $user_email, $epf_no, $user_national_id, $user_mobile, $user_address, $user_gender){
        try {
          $stmt = $this->conn->prepare("UPDATE user SET  fullname= :fullname, user_type= :user_type, user_department= :user_department, user_email= :user_email, epf_no= :epf_no, user_national_id= :user_national_id, user_mobile= :user_mobile, user_address= :user_address, user_gender= :user_gender WHERE username = :username");
           $stmt->bindparam(":username", $username);
           
           $stmt->bindparam(":fullname", $fullname);
           $stmt->bindparam(":user_type", $user_type);
           $stmt->bindparam(":user_department", $user_department);
           $stmt->bindparam(":user_email", $user_email);
           $stmt->bindparam(":epf_no", $epf_no);
           $stmt->bindparam(":user_national_id", $user_national_id);
           $stmt->bindparam(":user_mobile", $user_mobile);
           $stmt->bindparam(":user_address", $user_address);
           $stmt->bindparam(":user_gender", $user_gender);
           $stmt->execute();
           return $stmt;
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

  
      // Delete
      public function delete($username){
        try{
          $stmt = $this->conn->prepare("DELETE FROM user WHERE username = :username");
          $stmt->bindparam(":username", $username);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
      }
  
      // Redirect URL method
      public function redirect($url){
        header("Location: $url");
      }

      //user_search
      public function getUsername($username){
        try {
          $stmt = $this->conn->prepare("SELECT username FROM user WHERE username = :username");
          $stmt->bindparam(":username", $username);
          $stmt->execute();
          return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
      }
      public function getName($username){
        try {
          $stmt = $this->conn->prepare("SELECT fullname FROM user WHERE username = :username");
          $stmt->bindparam(":username", $username);
          $stmt->execute();
          return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
      }
      public function getUserType($username){
        try {
          $stmt = $this->conn->prepare("SELECT user_type FROM user WHERE username = :username");
          $stmt->bindparam(":username", $username);
          $stmt->execute();
          return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
      }
      public function getUserDepartment($username){
        try {
          $stmt = $this->conn->prepare("SELECT user_department FROM user WHERE username = :username");
          $stmt->bindparam(":username", $username);
          $stmt->execute();
          return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
      }
      public function getUserEmail($username){
        try {
          $stmt = $this->conn->prepare("SELECT user_email FROM user WHERE username = :username");
          $stmt->bindparam(":username", $username);
          $stmt->execute();
          return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
      }
      public function getEpfNo($username){
        try {
          $stmt = $this->conn->prepare("SELECT epf_no FROM user WHERE username = :username");
          $stmt->bindparam(":username", $username);
          $stmt->execute();
          return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
      }
      public function getUserNationalId($username){
        try {
          $stmt = $this->conn->prepare("SELECT user_national_id FROM user WHERE username = :username");
          $stmt->bindparam(":username", $username);
          $stmt->execute();
          return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
      }
      public function getUserMobile($username){
        try {
          $stmt = $this->conn->prepare("SELECT user_mobile FROM user WHERE username = :username");
          $stmt->bindparam(":username", $username);
          $stmt->execute();
          return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
      }
      public function getUserAddress($username){
        try {
          $stmt = $this->conn->prepare("SELECT user_address FROM user WHERE username = :username");
          $stmt->bindparam(":username", $username);
          $stmt->execute();
          return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
      }
      public function getUserGender($username){
        try {
          $stmt = $this->conn->prepare("SELECT user_gender FROM user WHERE username = :username");
          $stmt->bindparam(":username", $username);
          $stmt->execute();
          return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
      }

      //get username by passing username and password
      public function checkUserExcistance($username,$password){
        try {
          $stmt1 = $this->conn->prepare("SELECT username FROM user WHERE username = :username");
          $stmt1->bindparam(":username", $username);
          $stmt1->execute();
          
          $stmt2 = $this->conn->prepare("SELECT password FROM user WHERE username = :username");
          $stmt2->bindparam(":username", $username);
          $stmt2->execute();
          
          if (password_verify($password,$stmt2->fetchColumn())==1) {
            print_r($stmt2->fetchColumn());
            return $stmt1->fetchColumn();
          }else {
            return null;
          }
          
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

      private $user;

      public function setCurrentUser($username){
        $this->user = $username;
      }

      public function getCurrentUser(){
          return  $this->user;
      }

      public function getRowData($user_type,$department){
        try {
          $result = $this->conn->prepare("SELECT * FROM user WHERE user_type = :user_type AND user_department = :department");
          $result->bindparam(":user_type", $user_type);
          $result->bindparam(":department", $department);
          $result->execute();
          $data = $result->fetchAll(PDO::FETCH_ASSOC);
          
          
            foreach($data as $row) {
              echo '
                        <tr>
                            <td>'.$row['fullname'].'</td>
                            <td>'.$row['user_national_id'].'</td>
                            <td>'.$row['user_email'].'</td>
                            <td>'.$row['epf_no'].'</td>
                            <td>'.$row['user_mobile'].'</td>
                            <td>'.$row['user_address'].'</td>

                        </tr>
                    ';
            }
      
          //return $data->fetchColumn();
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

      //Academic Details -> Achievements
      public function insertAchievements($username, $achiev_name, $achiev_type, $achiev_descrip){
        try{
          $stmt = $this->conn->prepare("INSERT INTO achievements (username, achiev_name, achiev_type, achiev_descrip) VALUES(:username, :achiev_name, :achiev_type, :achiev_descrip)");

          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":achiev_name", $achiev_name);
          $stmt->bindparam(":achiev_type", $achiev_type);
          $stmt->bindparam(":achiev_descrip", $achiev_descrip);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }

      public function getAchievementsData($username){
        try {
          $result = $this->conn->prepare("SELECT * FROM achievements WHERE username = :username");
          $result->bindparam(":username", $username);
          $result->execute();
          $data = $data = $result->fetchAll(PDO::FETCH_ASSOC);
          return $data;
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

      public function deleteAchievementsData($username,$achiev_name){
        try {
          $result = $this->conn->prepare("delete FROM achievements WHERE username = :username and achiev_name = :achiev_name");
          $result->bindparam(":username", $username);
          $result->bindparam(":achiev_name", $achiev_name);
          $result->execute();
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

      //Academic Details -> Commities
      public function insertCommities($username, $comm_name, $comm_post, $comm_start_year,$comm_end_year,$comm_decrip){
        try{
          $stmt = $this->conn->prepare("INSERT INTO commities(username, comm_name , comm_post, comm_start_year,comm_end_year,comm_decrip
          ) VALUES(:username, :comm_name, :comm_post, :comm_start_year,:comm_end_year,:comm_decrip)");

          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":comm_name", $comm_name);
          $stmt->bindparam(":comm_post", $comm_post);
          $stmt->bindparam(":comm_start_year", $comm_start_year);
          $stmt->bindparam(":comm_end_year", $comm_end_year);
          $stmt->bindparam(":comm_decrip", $comm_decrip);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }

      public function getCommitiesData($username){
        try {
          $result = $this->conn->prepare("SELECT * FROM commities WHERE username = :username");
          $result->bindparam(":username", $username);
          $result->execute();
          $data = $data = $result->fetchAll(PDO::FETCH_ASSOC);
          return $data;
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
      public function deleteCommitiesData($username,$comm_name){
        try {
          $result = $this->conn->prepare("DELETE FROM commities WHERE username = :username and comm_name = :comm_name");
          $result->bindparam(":username", $username);
          $result->bindparam(":comm_name", $comm_name);
          $result->execute();
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

      //Academic Details -> Community Services
      public function insertCommunityServ($username, $comm_srv_act, $year){
        try{
          $stmt = $this->conn->prepare("INSERT INTO comm_services(username, comm_srv_act, year
          ) VALUES(:username, :comm_srv_act, :year)");

          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":comm_srv_act", $comm_srv_act);
          $stmt->bindparam(":year", $year);
          
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }

      public function getCommunityServ($username){
        try {
          $result = $this->conn->prepare("SELECT * FROM comm_services WHERE username = :username");
          $result->bindparam(":username", $username);
          $result->execute();
          $data = $data = $result->fetchAll(PDO::FETCH_ASSOC);
          return $data;
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
      public function deleteCommunityServ($username,$comm_srv_act){
        try {
          $result = $this->conn->prepare("DELETE FROM comm_services WHERE username = :username and comm_srv_act = :comm_srv_act");
          $result->bindparam(":username", $username);
          $result->bindparam(":comm_srv_act", $comm_srv_act);
          $result->execute();
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

      //Academic Details -> DOK
      public function insertDok($username,$dok_activity,$dok_year){
        try{
          $stmt = $this->conn->prepare("INSERT INTO dok(username,dok_activity,dok_year) VALUES(:username,:dok_activity, :dok_year)");

          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":dok_activity", $dok_activity);
          $stmt->bindparam(":dok_year", $dok_year);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }

      public function getDok($username){
        try {
          $result = $this->conn->prepare("SELECT * FROM dok WHERE username = :username");
          $result->bindparam(":username", $username);
          $result->execute();
          $data = $data = $result->fetchAll(PDO::FETCH_ASSOC);
          return $data;
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
      public function deleteDok($username,$dok_activity){
        try {
          $result = $this->conn->prepare("delete FROM dok WHERE username = :username and dok_activity = :dok_activity");
          $result->bindparam(":username", $username);
          $result->bindparam(":dok_activity", $dok_activity);
          $result->execute();
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

      //Academic Details -> publication_c
      public function insertPublicationC($username,$c_paper_title ,$c_main_author,$c_co_author,$c_publish_yr,$c_type,$c_status){
        try{
          $stmt = $this->conn->prepare("INSERT INTO publication_c(username,c_paper_title ,c_main_author,c_co_author,c_publish_yr,c_type,c_status) VALUES(:username,:c_paper_title ,:c_main_author,:c_co_author,:c_publish_yr,:c_type,:c_status)");

          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":c_paper_title", $c_paper_title);
          $stmt->bindparam(":c_main_author", $c_main_author);
          $stmt->bindparam(":c_co_author", $c_co_author);
          $stmt->bindparam(":c_publish_yr", $c_publish_yr);
          $stmt->bindparam(":c_type", $c_type);
          $stmt->bindparam(":c_status", $c_status);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }

      public function getPublicationC($username){
        try {
          $result = $this->conn->prepare("SELECT * FROM publication_c WHERE username = :username");
          $result->bindparam(":username", $username);
          $result->execute();
          $data = $data = $result->fetchAll(PDO::FETCH_ASSOC);
          return $data;
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
      public function deletePublicationC($username,$c_paper_title){
        try {
          $result = $this->conn->prepare("delete FROM publication_c WHERE username = :username and c_paper_title = :c_paper_title");
          $result->bindparam(":username", $username);
          $result->bindparam(":c_paper_title", $c_paper_title);
          $result->execute();
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

      //Academic Details -> publication_j
      public function insertPublicationJ($username,$j_paper_title ,$j_main_author,$j_co_author,$j_publish_yr,$j_name,$j_status){
        try{
          $stmt = $this->conn->prepare("INSERT INTO publication_j(username,j_paper_title ,j_main_author,j_co_author,j_publish_yr,j_name,j_status) VALUES(:username,:j_paper_title ,:j_main_author,:j_co_author,:j_publish_yr,:j_name,:j_status)");

          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":j_paper_title", $j_paper_title);
          $stmt->bindparam(":j_main_author", $j_main_author);
          $stmt->bindparam(":j_co_author", $j_co_author);
          $stmt->bindparam(":j_publish_yr", $j_publish_yr);
          $stmt->bindparam(":j_name", $j_name);
          $stmt->bindparam(":j_status", $j_status);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }

      public function getPublicationJ($username){
        try {
          $result = $this->conn->prepare("SELECT * FROM publication_j WHERE username = :username");
          $result->bindparam(":username", $username);
          $result->execute();
          $data = $data = $result->fetchAll(PDO::FETCH_ASSOC);
          return $data;
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
      public function deletePublicationJ($username,$j_paper_title){
        try {
          $result = $this->conn->prepare("DELETE FROM publication_j WHERE username = :username and j_paper_title = :j_paper_title");
          $result->bindparam(":username", $username);
          $result->bindparam(":j_paper_title", $j_paper_title);
          $result->execute();
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

      //Academic Details -> Contribution_of_national_level
      public function insertConl($username,$cn_activity,$year){
        try{
          $stmt = $this->conn->prepare("INSERT INTO contri_na(username,cn_activity ,year) VALUES(:username,:cn_activity ,:year)");

          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":cn_activity", $cn_activity);
          $stmt->bindparam(":year", $year);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }

      public function getConl($username){
        try {
          $result = $this->conn->prepare("SELECT * FROM contri_na WHERE username = :username");
          $result->bindparam(":username", $username);
          $result->execute();
          $data = $data = $result->fetchAll(PDO::FETCH_ASSOC);
          return $data;
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
      public function deleteConl($username,$cn_activity){
        try {
          $result = $this->conn->prepare("DELETE FROM contri_na WHERE username = :username and cn_activity = :cn_activity");
          $result->bindparam(":username", $username);
          $result->bindparam(":cn_activity", $cn_activity);
          $result->execute();
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

      //Academic Details -> Contribution_of_International_level
      public function insertConIn($username,$in_activity,$year){
        try{
          $stmt = $this->conn->prepare("INSERT INTO contri_in(username,in_activity ,year) VALUES(:username,:in_activity ,:year)");

          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":in_activity", $in_activity);
          $stmt->bindparam(":year", $year);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }

      public function getConIn($username){
        try {
          $result = $this->conn->prepare("SELECT * FROM contri_in WHERE username = :username");
          $result->bindparam(":username", $username);
          $result->execute();
          $data = $data = $result->fetchAll(PDO::FETCH_ASSOC);
          return $data;
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
      public function deleteConIn($username,$in_activity){
        try {
          $result = $this->conn->prepare("DELETE FROM contri_in WHERE username = :username and in_activity = :in_activity");
          $result->bindparam(":username", $username);
          $result->bindparam(":in_activity", $in_activity);
          $result->execute();
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

      //Academic Details -> Introduced_External_Courses
      public function insertIntroExCo($username,$ex_name,$start_date,$end_date,$intro_year,$target_aud){
        try{
          $stmt = $this->conn->prepare("INSERT INTO intro_ex_co(username,ex_name,start_date,end_date,intro_year,target_aud) VALUES(:username,:ex_name,:start_date,:end_date,:intro_year,:target_aud)");
          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":ex_name", $ex_name);
          $stmt->bindparam(":start_date", $start_date);
          $stmt->bindparam(":end_date", $end_date);
          $stmt->bindparam(":intro_year", $intro_year);
          $stmt->bindparam(":target_aud", $target_aud);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }

      public function getIntroExCo($username){
        try {
          $result = $this->conn->prepare("SELECT * FROM intro_ex_co WHERE username = :username");
          $result->bindparam(":username", $username);
          $result->execute();
          $data = $data = $result->fetchAll(PDO::FETCH_ASSOC);
          return $data;
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
      public function deleteIntroExCo($username,$ex_name){
        try {
          $result = $this->conn->prepare("DELETE FROM intro_ex_co WHERE username = :username and ex_name = :ex_name");
          $result->bindparam(":username", $username);
          $result->bindparam(":ex_name", $ex_name);
          $result->execute();
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

      //Academic Details -> Newly_Introduced_Courses
      public function insertNewInCo($username,$co_name,$credits,$unit_code,$type,$intro_year,$description,$benifisheries){
        try{
          $stmt = $this->conn->prepare("INSERT INTO new_intro_co(username,co_name,credits,unit_code,type,intro_year,description,benifisheries)
          VALUES(:username,:co_name,:credits,:unit_code,:type,:intro_year,:description,:benifisheries)");
          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":co_name", $co_name);
          $stmt->bindparam(":credits", $credits);
          $stmt->bindparam(":unit_code", $unit_code);
          $stmt->bindparam(":type", $type);
          $stmt->bindparam(":intro_year", $intro_year,);
          $stmt->bindparam(":description", $description,);
          $stmt->bindparam(":benifisheries", $benifisheries,);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }

      public function getNewInCo($username){
        try {
          $result = $this->conn->prepare("SELECT * FROM new_intro_co WHERE username = :username");
          $result->bindparam(":username", $username);
          $result->execute();
          $data = $data = $result->fetchAll(PDO::FETCH_ASSOC);
          return $data;
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
      public function deleteNewInCo($username,$co_name){
        try {
          $result = $this->conn->prepare("DELETE FROM new_intro_co WHERE username = :username and co_name = :co_name");
          $result->bindparam(":username", $username);
          $result->bindparam(":co_name", $co_name);
          $result->execute();
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

      //Academic Details -> Conducted_Staff_Development_Programs
      public function insertConStDev($username,$name,$con_year,$start_date,$end_date,$role,$type,$conduc_inst){
        try{
          $stmt = $this->conn->prepare("INSERT INTO staff_dev_con(username,name,con_year,start_date,end_date,role,type,conduc_inst)
          VALUES(:username,:name,:con_year,:start_date,:end_date,:role,:type,:conduc_inst)");
          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":name", $name);
          $stmt->bindparam(":con_year", $con_year);
          $stmt->bindparam(":start_date", $start_date);
          $stmt->bindparam(":end_date", $end_date);
          $stmt->bindparam(":role", $role,);
          $stmt->bindparam(":type", $type,);
          $stmt->bindparam(":conduc_inst", $conduc_inst,);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }

      public function getConStDev($username){
        try {
          $result = $this->conn->prepare("SELECT * FROM staff_dev_con WHERE username = :username");
          $result->bindparam(":username", $username);
          $result->execute();
          $data = $data = $result->fetchAll(PDO::FETCH_ASSOC);
          return $data;
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
      public function deleteConStDev($username,$name){
        try {
          $result = $this->conn->prepare("DELETE FROM staff_dev_con WHERE username = :username and name = :name");
          $result->bindparam(":username", $username);
          $result->bindparam(":name", $name);
          $result->execute();
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

      //Academic Details -> Participation_In_Staff_Devlopment_Programs
      public function insertParStDev($username,$name,$par_year,$start_date,$end_date,$type,$conduc_inst){
        try{
          $stmt = $this->conn->prepare("INSERT INTO staff_dev_par(username,name,par_year,start_date,end_date,type,conduc_inst)
          VALUES(:username,:name,:par_year,:start_date,:end_date,:type,:conduc_inst)");
          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":name", $name);
          $stmt->bindparam(":par_year", $par_year);
          $stmt->bindparam(":start_date", $start_date);
          $stmt->bindparam(":end_date", $end_date);
          $stmt->bindparam(":type", $type,);
          $stmt->bindparam(":conduc_inst", $conduc_inst,);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }

      public function getParStDev($username){
        try {
          $result = $this->conn->prepare("SELECT * FROM staff_dev_par WHERE username = :username");
          $result->bindparam(":username", $username);
          $result->execute();
          $data = $data = $result->fetchAll(PDO::FETCH_ASSOC);
          return $data;
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
      public function deleteParStDev($username,$name){
        try {
          $result = $this->conn->prepare("DELETE FROM staff_dev_par WHERE username = :username and name = :name");
          $result->bindparam(":username", $username);
          $result->bindparam(":name", $name);
          $result->execute();
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

      //Academic Details -> Outreach_Activities
      public function insertOutAct($username,$activity,$year){
        try{
          $stmt = $this->conn->prepare("INSERT INTO outreach_acti(username,activity,year)
          VALUES(:username,:activity,:year)");
          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":activity", $activity);
          $stmt->bindparam(":year", $year);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }

      public function getOutAct($username){
        try {
          $result = $this->conn->prepare("SELECT * FROM outreach_acti WHERE username = :username");
          $result->bindparam(":username", $username);
          $result->execute();
          $data = $data = $result->fetchAll(PDO::FETCH_ASSOC);
          return $data;
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
      public function deleteOutAct($username,$activity){
        try {
          $result = $this->conn->prepare("DELETE FROM outreach_acti WHERE username = :username and activity = :activity");
          $result->bindparam(":username", $username);
          $result->bindparam(":activity", $activity);
          $result->execute();
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

      //Academic Details -> Events_Conducted_Or_Organized 
      public function insertEventConOrg($username,$event_name,$event_type,$event_date,$type,$role,$description){
        try{
          $stmt = $this->conn->prepare("INSERT INTO events_con_org(username,event_name,event_type,event_date,type,role,description)
          VALUES(:username,:event_name,:event_type,:event_date,:type,:role,:description)");
          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":event_name", $event_name);
          $stmt->bindparam(":event_type", $event_type);
          $stmt->bindparam(":event_date", $event_date);
          $stmt->bindparam(":type", $type);
          $stmt->bindparam(":role", $role,);
          $stmt->bindparam(":description", $description,);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }

      public function getEventConOrg($username){
        try {
          $result = $this->conn->prepare("SELECT * FROM events_con_org WHERE username = :username");
          $result->bindparam(":username", $username);
          $result->execute();
          $data = $data = $result->fetchAll(PDO::FETCH_ASSOC);
          return $data;
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
      public function deleteEventConOrg($username,$event_name){
        try {
          $result = $this->conn->prepare("DELETE FROM events_con_org WHERE username = :username and event_name = :event_name");
          $result->bindparam(":username", $username);
          $result->bindparam(":event_name", $event_name);
          $result->execute();
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

       //Academic Details -> Grants 
       public function insertGrants($username,$grant_name,$amount,$role,$purpose,$benifisheries,$type,$other){
        try{
          $stmt = $this->conn->prepare("INSERT INTO grant_(username,grant_name,amount,role,purpose,benifisheries,type,other)
          VALUES(:username,:grant_name,:amount,:role,:purpose,:benifisheries,:type,:other)");
          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":grant_name", $grant_name);
          $stmt->bindparam(":amount", $amount);
          $stmt->bindparam(":role", $role);
          $stmt->bindparam(":purpose", $purpose);
          $stmt->bindparam(":benifisheries", $benifisheries,);
          $stmt->bindparam(":type", $type,);
          $stmt->bindparam(":other", $other,);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }

      public function getGrants($username){
        try {
          $result = $this->conn->prepare("SELECT * FROM grant_ WHERE username = :username");
          $result->bindparam(":username", $username);
          $result->execute();
          $data = $data = $result->fetchAll(PDO::FETCH_ASSOC);
          return $data;
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
      public function deleteGrants($username,$grant_name){
        try {
          $result = $this->conn->prepare("DELETE FROM grant_ WHERE username = :username and grant_name = :grant_name");
          $result->bindparam(":username", $username);
          $result->bindparam(":grant_name", $grant_name);
          $result->execute();
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }


      // ============================== REPORT data Queries START ====================================================
      
      public function getReportData($dept,$from,$to,$tablename){



        // $tablename <--- this is the DB table name 
        
        // this function get the  report data according to given parameters.

        // ex: if [ $tablename= "achievements" & $dept="chemistry" & $from="2020/01/01" & $to= "2020/01/31" ]
        // then this function should return all the achievement records that has been created between 2020/01/01 and 2020/01/31
        // by the user's of chemistry department  


        
        echo "
        
        getting all the .$tablename. records created between  .$from. - .$to. by the users of .$dept. department
        
        ";

        return "data";
      }

      // ============================== REPORT data Queries END ====================================================
}

?>