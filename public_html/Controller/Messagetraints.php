<?php

 trait  Message
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
        header("Location: index.php?page=showhomepage");
    }

    public static function modelPath()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/public_html/Model/Model.php';
    }
    public static function MoviePath()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/public_html/Model/Movie.php';
    }
    public static function imagePath()
    {
        $_SERVER['DOCUMENT_ROOT'] . "/public_html/Views/img/";
    }
    public static function controllerPath()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/public_html/Controller/Controller.php';

    }
}