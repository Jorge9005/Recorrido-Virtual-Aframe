<?php 
    //Llamado de app.php
    require 'app.php';

//Funcion para saber que tempalte se utilizara
    function incluirTemplates(string $nombre, bool $inicio=false){
        include TEMPLATES_URL . "/$nombre.php";
    }

    //Funcion Autenticar
    function estaAutenticado():bool{
        session_start();

        $auth=$_SESSION['login'];
        if($auth === 1){
            return true;;
        }
        else{
            if($auth === 2){
                return false;;
            }
        }
        return false;

        
        
    }

    /* //Funcion Autenticar
    function clienteAutenticado():bool{
        session_start();

        $authc=$_SESSION['login'];
        if($authc){
            return true;;
        }
        return false;
    } */

    //Funcion Autenticar
    function clienteAutenticado():bool{
        session_start();

        $auth=$_SESSION['login'];
        if($auth){
            return false;;
        }
        

        $authc=$_SESSION['iniciar'];
        if($authc){
            return true;;
        }
        return false;
    }
    