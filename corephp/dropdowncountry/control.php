<?php
include_once('model.php'); //step 1 load model
class control extends model //step 2 extends

{
function __construct(){
    session_start();

    model::__construct(); //step 3 call model__construct
    date_default_timezone_set('asia/calcutta');
    $url=$_SERVER['PATH_INFO'];
    switch($url)
    {
        case '/index':
            include_once('index.php');
            break;
            case '/index2':
                include_once('index2.php');
                break;
            case '/about':
                include_once('about.php');
                break;
               

            case '/displaycountry':
            $country_arr=$this->select('country');
            // if(isset($_REQUEST['submit']))
			// {
			// 	$name=$_REQUEST['name'];
			// 	$cid=$_REQUEST['cid'];
			// 	$sid=$_REQUEST['sid'];
			// 	$city_id=$_REQUEST['city_id'];
			// 	$data=array("name"=>$name,"cid"=>$cid,"sid"=>$sid,"city_id"=>$city_id);
			// 	$res=$this->insert('reg',$data);
			// 	if($res)
			// 	{
			// 		echo "<script>alert('Register Success')</script>";
			// 	}
            // }
            include_once('displaycountry.php');
            break;
                               

            default:
            include_once('pagenotfound.php');
            break;
                                    }                              
}

}

$obj=new control();


?>