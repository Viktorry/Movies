<?php

trait Message
{

    public static function insrtallmsg()
    {
        $msg = "You must insert all input fields!!!";
        echo $msg;
    }

    public static function insrtsuccsses()
    {
        $msg = "Insert successfull";
        echo $msg;
    }

    public static function insrtltrsandnumbrs()
    {
        $msg = 'Only letters and white space allowed!!!';
        echo $msg;
    }

    public static function insrtmethodwrong()
    {
        $msg = "Method is wrong!!!";
        echo $msg;
    }

    public static function insrtheaderHomePage()
    {
        header("Location: /Views/HomePage.php");
    }

    public static function modelPath()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/Model/Model.php';
    }
    public static function imagePath()
    {
        $_SERVER['DOCUMENT_ROOT'] . "/Views/img/";
    }
    public static function controllerPath()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/Controller.php';

    }
}