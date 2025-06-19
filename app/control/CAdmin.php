<?php

class CAdmin{

    public static function home(){
        $view = new VAdmin();
        $users = FPersistentManager::getInstance()->getAllUsers();
        $totUsers = count($users);
        $view->home($totUsers);
    }

    public static function manageUsers(){
        $view = new VAdmin();
        $usersQuery = FPersistentManager::getInstance()->getAllUsers();
        $users = array();
        foreach($usersQuery as $queryRes){
            $user = new EUser($queryRes["idUser"], $queryRes["firstName"], $queryRes["lastName"], new DateTime ($queryRes["birthDate"]), $queryRes["birthPlace"]);
            $users[] = $user;
        }

        
        $view->manageUsers($users);
    }

    public static function showInsertUser(){

        $view = new VAdmin();
        $view->showInsertUser();
    }

    public static function insertUser(){
        $view = new VUser();
        $user = new EUser(null, UHTTP::post("firstName"), UHTTP::post("lastName"), new DateTime(UHTTP::post("birthDate")), UHTTP::post("birthPlace"));
        $result = FPersistentManager::getInstance()->saveObject($user);
        if($result == false){
            echo 'UTENTE GIA ESISTENTE';
        }else{
            header('Location: /~momok/Admin/manageUsers');
        }
    }

    public static function deleteUser($idUser){
        $result = FPersistentManager::getInstance()->deleteObject('EUser',$idUser);
        if($result){header('Location: /~momok/Admin/manageUsers'); exit();}
        
    }

    public static function showUpdateUser(){
        $view = new VAdmin();
        $view->showUpdateUser();
    }

    public static function updateUser(){
        $view = new VUser();
        $user = new EUser(null, UHTTP::post("firstName"), UHTTP::post("lastName"), new DateTime(UHTTP::post("birthDate")), UHTTP::post("birthPlace"));
        $result = FPersistentManager::getInstance()->saveObject($user);
        if($result == false){
            echo 'UTENTE GIA ESISTENTE';
        }else{
            header('Location: /~momok/Admin/manageUsers');
        }
    }
}