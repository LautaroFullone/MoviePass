<?php

namespace Controllers;

use Models\User as User;
use Models\CreditCard as CreditCard;
use Dao\UserDao as U_DAO;
use Dao\CreditCardDao as CC_DAO;
use Dao\PurchaseDao as P_DAO;

class UserController
{
    private $userRepo;
    private $creditCardDao;
    private $purchaseDao;

  

    public function __construct()
    {
        $this->userRepo = new U_DAO();
        $this->creditCardDao = new CC_DAO();
        $this->purchaseDao = new P_DAO();
    }
    
    public function showAdminView($msgError = ""){
        require_once(ADMIN_VIEWS . "eleccion.php");

    }

    public function setAdmin($id_userType, $id_user)
    {
        try
        {
            $this->userRepo->modifyUserType($id_userType, $id_user);
            $users = $this->userRepo->GetAll();
        }
        catch(\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
        }      
        require_once(ADMIN_VIEWS . "usersList.php");
        
    }

    public function viewSetAdmin ($msgError = "")
    {
        try
        {
            $users = $this->userRepo->GetAll();
        }
        catch(\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
        }
            require_once(ADMIN_VIEWS . "usersList.php");     
    }

    public function showPrincipalView ($msgError = "")
    {
        require_once(USER_VIEWS . "board.php");
        
    }
    public function showModifyView ($msgError = "")
    {
        require_once(USER_VIEWS . "modify-user-form.php");
    }
    
 

    public function addTarjeta($cardHolder,$numberCC,$expiration,$company,$idUser,$cantidad,$idFuncion){
        try
        {  
            $tarjeta = new CreditCard($cardHolder,$numberCC,$expiration,$company);
            $this->creditCardDao->Add($tarjeta,$idUser);
            $cardsList = $this->creditCardDao->GetAll($idUser);
            require_once(USER_VIEWS . "tarjeta-compra-form.php");
        }
        catch(\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
        }
 
    }

    public function addOnlyTarjeta($cardHolder,$numberCC,$expiration,$company,$idUser){
        try
        {  
            $tarjeta = new CreditCard($cardHolder,$numberCC,$expiration,$company);
            $this->creditCardDao->Add($tarjeta,$idUser);
            $msgError = array( "description" => "La tarjeta se ha agregado con éxito!",
            "type" => 2);
            require_once(VIEWS_PATH . "errorView.php");
        }
        catch(\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
        }

        $this->showCards($idUser);
 
    }

    public function login ($mail, $password)
    {
        try
        {
            $array = $this->userRepo->GetOneMail($mail);
            $flag =0 ;
            foreach($array as $user){

                if ($user["mail"] == $mail && password_verify($password,$user["pass"] ))
                { 
                    if($user["id_userType"]== 2){
                    $flag =1;
                    $_SESSION["logged"]=$user;
                    $this->showPrincipalView();
                    }  
                    if($user["id_userType"]== 1){
                        $flag =1;
                        $_SESSION["logged"]=$user;
                        $this->showAdminView();
                    }
                }
            }
            if($flag == 0){
                    $msgError = array( "description" => "Datos incorrectos. Intente nuevamente o registrese en el sistema",
                    "type" => 1);
                    $this->showLoginView($msgError);
            }
        }
        catch(\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            $this->showLoginView();
        }
    }

  
    public function showSingInFormView()
    {
        require_once(USER_VIEWS . "signIn.php");
    }

    public function showLoginView ($msgError = "")
    {
        $this->verifyLogin($msgError);
    }

    public function showLogOutView()
    {   
        session_destroy();
        require_once(USER_VIEWS . "logOutView.php");
    }
    public function userNameExists ($userName)
    {
        try
        {
            $array = $this->userRepo->GetAll();

            foreach ($array as $user)
            {
                if($user["userName"] == $userName)
                    return true;
            }
            return false;
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            $this->showLoginView($msgError);
        }
    }

    public function mailExists ($mail)
    {
        try
        {
            $array = $this->userRepo->GetAll();

            foreach ($array as $user)
            {
                if($user["mail"] == $mail)
                    return true;
            }
            return false;
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            $this->showLoginView($msgError);
        }
    }

    public function verificar_mod_user ($userName,$id)
    {
        try
        {
            $array = $this->userRepo->GetAll();

            foreach ($array as $user)
            {
                if($user["userName"] == $userName && $user["id_user"] != $id)
                    return true;
            }
            return false;
        }
        catch(\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            $this->showLoginView($msgError);
        }
    }
    public function verificar_mod_mail ($mail,$id)
    {
        try
        {
            $array = $this->userRepo->GetAll();

            foreach ($array as $user)
            {
                if($user["mail"] == $mail && $user["id_user"] != $id)
                    return true;
            }
            return false;
        }
        catch(\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            $this->showLoginView($msgError);
        }
    }
    public function modify($firstname,$lastName,$userName,$mail,$id_user){

        try
        {
            if(!$this->verificar_mod_user($userName,$id_user)){
                
            if(!$this->verificar_mod_mail($mail,$id_user)){
                $this->userRepo->Modify($firstname,$lastName,$userName,$mail,$id_user);
                    $aux = $this->userRepo->getOneMail($mail);
                    $_SESSION["logged"] = $aux[0];
                    $msgError = array( "description" => "Se modifico con exito el Perfil.",
                    "type" => 2);  
                    $this->showPrincipalView($msgError);
            }else{
                $msgError = array( "description" => "El mail  ya esta en uso.",
                    "type" => 3);  
                $this->showModifyView($msgError);
            }        
            }
            else{
                        $msgError = array( "description" => "El Nombre de Usuario ya esta en uso.",
                    "type" => 3);  
                        $this->showModifyView($msgError);
            }
        }
        catch(\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            $this->showPrincipalView($msgError);
        }
    }



    public function signIn ($firstName = "", $lastName = "", $userName = "", $pass = "", $mail = "", $dni = "", $birthDate = "", $userType = "")
    {
        try
        {
            if ($this->userNameExists($userName) && $this->mailExists($mail))
                $this->showSingInFormView();
            else 
            {
                $user = new User($firstName, $lastName, $userName, $pass, $mail, $dni, $birthDate, $userType);
                $this->userRepo->Add($user);
                $msgError = array( "description" => "El usuario se agrego con éxito",
                    "type" => 3);
                $this->showLoginView($msgError);
            }
        }
        catch(\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            $this->showLoginView($msgError);
        }
    }
    public function showListCards($cantidad,$idFuncion, $idUser,$dateFunction)
    {
        try
        {
            $cardsList = array();
            $list = $this->creditCardDao->getNumber_Company($idUser);
            
            foreach($list as $value)
            {
                if($value["expiration"]> date("Y-m-d"))
                    array_push($cardsList,$value);
            }
            $cardsList=$this->encryptCards($cardsList);
        
            require_once( USER_VIEWS . "tarjeta-compra-form.php");
        }
        catch(\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(USER_VIEWS . "board.php");
        }

    }

    public function encryptCards($list)
    {
        $cantidad=count($list);
        for($i=0;$i<$cantidad;$i++){
            $list[$i]["numberCC"] = "************".substr($list[$i]["numberCC"],-4);
        }
        return $list;
    }

    public function showCards($idUser)
    {
        try
        {
            $list = $this->creditCardDao->GetALL($idUser);
            $companiesList= $this->creditCardDao->getCompanies();
            
            $cardsList=$this->encryptCards($list);
            if(!$cardsList)
            {
                $msgError = array( "description" => "No posees tarjetas dadas de alta en el sistema",
                "type" => 3);
                
            }
             require_once(USER_VIEWS . "user-card-list.php");
            
        }
        catch(PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(USER_VIEWS . "board.php");
        }

    }

    public function Remove ($userName)
    {
        try
        {
            $this->userRepo->Remove($userName);
            $this->showListUsersView();
        }
        catch(\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(USER_VIEWS . "board.php");
        }
            
    }

    public function showListUsersView()
    {
        require_once(USER_VIEWS . "userList.php");
    }

    public function viewProfile ($id_user)
    {   
        try
        {
            $user = $this->userRepo->GetOne($id_user);
            $this->showListUsersView();
        }
        catch(\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(USER_VIEWS . "board.php");
        }
        
    }   

   public function showPurchaseView($idUser)
   {
        try
        {
            $purchaseList = $this->purchaseDao->getAllPurchase($idUser);
            if($purchaseList)
                require_once(PURCHASE_VIEWS . "purchase-view.php");
            else
            {
                $msgError = array( "description" => "Aún no ha comprado ninguna entrada para ser listada",
                "type" => 3);
                require_once(USER_VIEWS . "board.php");
            }
        }
        catch(\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(USER_VIEWS . "board.php");
        }
   }

   public function showOrderTitlePurchases($idUser)
   {
       try
       {
            $purchaseList = $this->purchaseDao->getOrderTitlePurchases($idUser);
            require_once(PURCHASE_VIEWS . "purchase-view.php");
       }
       catch(\PDOException $ex)
       {
           $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
           "type" => 1);
           require_once(USER_VIEWS . "board.php");
       }
 
   }
   
   public function showOrderDatePurchases($idUser)
   {
       try
       {
            $purchaseList = $this->purchaseDao->getOrderDatePurchases($idUser);
            require_once(PURCHASE_VIEWS . "purchase-view.php");
       }
       catch(\PDOException $ex)
       {
           $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
           "type" => 1);
           require_once(USER_VIEWS . "board.php");
       }
   
   }

   public function removeCreditCard ($idCreditCard,$idUser)
   {
       try
       {
            $this->creditCardDao->removeCard($idCreditCard);
            $this->showCards($idUser);
       }
       catch(\PDOException $ex)
       {
           $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
           "type" => 1);
           require_once(USER_VIEWS . "board.php");
       }
   }

   public function verifyLogin($msgError ="")
   {
       if(isset($_SESSION["logged"]))
            require_once(USER_VIEWS ."board.php");
       else 
       require_once(USER_VIEWS ."login-form.php");
   }
}
?>