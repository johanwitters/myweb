<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

// Component Helper
jimport('joomla.application.component.helper');

abstract class MyWebHelper
{
    public static function getName()
    {
        $user = JFactory::getUser();
        $filename = "site" . $user->id . ".json";
        return $filename;
    }

    public static function save($data = null)
    {
        $obj = new stdClass();
        $obj->greeting = $data['greeting'];
        $obj->greeting2 = $data['greeting2'];
        $obj->image = $data['imageinfo']['image'];
        $obj->data  = array(
            array('1999','3.0'),
            array('2000','3.9'),
        );

        $jsonEncoded = json_encode($obj);

        $filename = MyWebHelper::getName();
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        fwrite($myfile, $jsonEncoded);
        fwrite($myfile, $txt);
        fclose($myfile);

        return true;
    }

    public static function load()
    {
        $filename = MyWebHelper::getName();
        $handle = fopen($filename, "r");
        $contents = fread($handle, filesize($filename));
        fclose($handle);

        $jsonDecoded = json_decode($contents);
        $greeting = $jsonDecoded->greeting;
        $greeting2 = $jsonDecoded->greeting2;
        $image = $jsonDecoded-->image;

        $data = array("id" => "", "greeting" => $greeting, "greeting2" => $greeting2, "image" => $image, "catid" => "catid");

        return $data;
    }
}
