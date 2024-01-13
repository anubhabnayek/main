<?php
include_once('model.php');
 class control extends model
 {
    function __construct()
    {
        session_start();
        model:: __construct();

        $url=$_SERVER['PATH_INFO'];

        switch($url)
        {
            case '/view':
            $data_view=$this->select('student');
            include_once('view.php');   
            break; 
            case '/login':
                if(isset($_REQUEST['submit'])){
                    $email=$_REQUEST['email'];
                    $password=md5($_REQUEST['password']);
                    $where=array("email"=>$email,"password"=>$password);
                    $res=$this->select_where('student',$where);
                    $chk=$res->num_rows;
                    if($chk==1){
                        $fetch=$res->fetch_object();
                        $_SESSION['user_id']=$fetch->id;
                        $_SESSION['username']=$fetch->email;
                        $_SESSION['name']=$fetch->name;

                        echo"<script>
                        alert('user login succesfully');
                        window.location='view';
                        </script>
                        ";
                    }
                    else{
                        echo"<script>
                        alert('login failed');
                        </script>
                        ";
                    }

                }
            
            include_once('login.php');   
            break; 
            case '/logout':

                unset($_SESSION['user_id']);
                unset($_SESSION['username']);

                echo"<script>
                alert('user logout successfully');
                window.location='login';
                </script>
                ";


                break;

            case '/add_data':
              if(isset($_REQUEST['submit']))
             //echo"<pre>";print_r($_REQUEST);exit;
              {
                $name=$_REQUEST['name'];
                $email=$_REQUEST['email'];
                $phone=$_REQUEST['phone'];
                $gender=$_REQUEST['gender'];
                $password=md5($_REQUEST['password']);
                $language_arr=$_REQUEST['language'];
                $language=implode(',',$language_arr);



                $file=$_FILES['file']['name'];
                $path="upload/user/".$file;
                $tmp_file=$_FILES['file']['tmp_name'];
                move_uploaded_file($tmp_file,$path);

                $arr=array("name"=>$name,"email"=>$email,"phone"=>$phone,"password"=>$password,"gender"=>$gender,"language"=>$language,"file"=>$file);
                $res=$this->insert('student',$arr);
                if($res)
                {
                    echo"<script>
                        alert('Customer Registered Success');
                        window.location='view';
                        </script>"; 
                  } 
                    else{
                        echo"<script>
                        alert('Failed');
                        </script>
                        ";

                }
            }  
            include_once('add_data.php');   
            break; 

            case '/edit':
                if(isset($_REQUEST['edit_id'])){
                 $std_id=$_REQUEST['edit_id'];
                 $where=array("id"=>$std_id);
                 $res=$this->select_where('student',$where);
                 $fetch=$res->fetch_object();
                 $old_img=$fetch->file;
                 
                 if(isset($_REQUEST['save'])){
                    $name=$_REQUEST['name'];
                    $email=$_REQUEST['email'];
                    $phone=$_REQUEST['phone'];
                    $gender=$_REQUEST['gender'];
                    $language_arr=$_REQUEST['language']; //lag arr convert into string
                    $language=implode(',',$language_arr);
                   
                    //image upload
                    if($_FILES['file']['size']>0)
                    {

                    $file=$_FILES['file']['name'];
                    $path='upload/user/'.$file;
                    $tmp_file=$_FILES['file']['tmp_name'];
                    move_uploaded_file($tmp_file,$path);
                   // echo"<pre>";print_r($_FILES);exit;
                    $arr=array("name"=>$name,"email"=>$email,"phone"=>$phone,"language"=>$language,"gender"=>$gender,"file"=>$file);
                   // echo"<pre>";print_r($arr);exit;
                    $res=$this->update('student',$arr,$where);
                    //echo"<pre>";print_r($res);exit;
                    if($res)
                    {
                       unlink('upload/user/'.$old_img);
                       
                       echo"<script>
                       alert('Update sucess');
                       window.location='';
                       </script>
                       ";
                    }
                }
                    else{
                        $arr=array("name"=>$name,"email"=>$email,"phone"=>$phone,"language"=>$language,"gender"=>$gender);
                        $res=$this->update('student',$arr,$where);
                        
                        if($res){
                            echo"<script>
                            alert('update Success');
                            window.location='';
                            </script>";

                    }
                }

                    
                    
                 }
                

                }
                include_once('edit_data.php');   
                break;

            case '/delete':
                 if(isset($_REQUEST['delete_id'])){
                    $std_id=$_REQUEST['delete_id'];
                    $where=array("id"=>$std_id);
                    $res=$this->delete_where('student',$where);
                    if($res){
                        echo"<script>
                        alert('data deleted successfully');
                        window.location='view';
                        </script>";
                    }
                        else{
                            echo"<script>
                            alert('data not deleted');
                            </script>"; 
                        }
                    

                 }      
                    break;

            default:
            include_once('pagenotfound.php');
            break;
            
            
        }
    }
 }
$obj=new control();

?>