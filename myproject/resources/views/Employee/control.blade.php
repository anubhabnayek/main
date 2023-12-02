<?php
include_once('../medical/model.php');
class control extends model

 {
function __construct(){
    session_start();
    model::__construct();
    $url=$_SERVER['PATH_INFO'];
    switch($url){
        case '/login':
            if(isset($_REQUEST['submit'])){
                $email=$_REQUEST['email'];
                $password=md5($_REQUEST['password']);
               //echo"<pre>";print_r($_REQUEST);exit;
              $where=array("email"=>$email,"password"=>$password);
              $res=$this->select_where('employee',$where);
              $chk=$res->num_rows;
              if($chk==1){
                $fetch=$res->fetch_object();
                $Status=$fetch->Status;
                if($Status=="Unblock")
                {
                $_SESSION['employee']=$email;
              // $_SESSION['emp_id']=$fetch->$emp_id;
               //$_SESSION['Emp_name']=$fetch->$Emp_name;

                echo"<script>
                alert('Employee login Success');
                window.location='index';
                </script>";
              }
              else{
                echo"<script>
                  alert('login failed due to Blocked Account');
                  window.location='login';
                    </script>";

              }
            }
              else{
                echo"<script>
                alert('employee login faild');
                </script>
                ";

              }


            }
           
        include_once('login.php');
        break;
        case '/Emp_logout':
            unset($_SESSION['employee']);
            //unset($_SESSION['emp_id']);

            echo"<script>
                  alert('Employee logout success');
                  window.location='login';
                  </script>";

                break;

        case '/index':
        include_once('index.php');
        break;

        case '/add_cate':
            if(isset($_REQUEST['submit'])){
                // 
                $category_name=$_REQUEST['category_name'];
                $category_img=$_FILES['category_img']['name'];
                $path="../upload/category_emp/".$category_img;
                $tmp_file=$_FILES['category_img']['tmp_name'];
                move_uploaded_file($tmp_file,$path);
                $created_at=date('Y-m-d H:i:s');
                $updated_at=date('Y-m-d H:i:s');
                $arr=array("category_name"=>$category_name,"category_img"=>$category_img,"created_at"=>$created_at,"updated_at"=>$updated_at);
                //echo"$res";exit;
                $res=$this->insert('category',$arr);
                if($res){
                    echo"<script>
                    alert('add category success ');
                    window.location='add_cate';

                    
                    </script>";
                }
                else{
                    echo"<script>
                    alert('failed');
                    
                    
                    </script>";
                }



            }
           
        include_once('add_cate.php');
        break;
         
        case '/add_emp':

        include_once('add_emp.php');
        break;

        case '/add_prod':
            if(isset($_REQUEST['submit'])){

            
                $product_name=$_REQUEST['product_name'];
                $product_img=$_FILES['product_img']['name'];
                $path="../upload/product_emp/".$product_img;
                $tmp_file=$_FILES['product_img']['tmp_name'];
                move_uploaded_file($tmp_file,$path);
                //echo"<pre>";print_r($_FILES);exit;
                $discount_price=$_REQUEST['discount_price'];
                $main_price=$_REQUEST['main_price'];
                $description=$_REQUEST['description'];
               
                $created_at=date('Y-m-d H:i:s');
                $updated_at=date('Y-m-d H:i:s');
                $arr=array("product_name"=>$product_name,"discount_price"=>$discount_price,"description"=>$description,"main_price"=>$main_price,"product_img"=>$product_img,"created_at"=>$created_at,"updated_at"=>$updated_at);
                //echo"$res";exit;
                $res=$this->insert('products',$arr);
                if($res){
                    echo"<script>
                    alert('add product success ');
                    window.location='add_prod';
    
                    
                    </script>";
                }
                else{
                    echo"<script>
                    alert('failed');
                    
                    
                    </script>";
                }
    
    
    
            }
           
        include_once('add_prod.php');
        break;


        case '/manage_cate':
        $data_category=$this->select('category');

        include_once('manage_cate.php');
        break;
          
        case '/manage_prod':
        $data_product=$this->select('products');

            include_once('manage_prod.php');
            break;
            case '/manage_cust':
                $data_customer=$this->select('customers');
        
                    include_once('manage_cust.php');
                    break;
        

            case '/delete':
                if(isset($_REQUEST['delcate_id'])){
                    $id=$_REQUEST['delcate_id'];
                    $where=array("id"=>$id);
                    $res=$this->delete_where('category',$where);
                    if($res){
                       echo"<script>
                       alert('deleted data');
                       window.location='manage_cate';
                       </script>
                       ";
                       
                    }
                    
    
                }
                if(isset($_REQUEST['delproduct_id'])){
                    $id=$_REQUEST['delproduct_id'];
                    $where=array("id"=>$id);
                    $res=$this->delete_where('products',$where);
                    if($res){
                       echo"<script>
                       alert('deleted data');
                       window.location='manage_prod';
                       </script>
                       ";
                       
                    }
                    
    
                }
                if(isset($_REQUEST['delcust_id'])){
                    $uid=$_REQUEST['delcust_id'];
                    $where=array("uid"=>$uid);
                    $res=$this->delete_where('customers',$where);
                    if($res){
                       echo"<script>
                       alert('deleted data');
                       window.location='manage_cust';
                       </script>
                       ";
                       
                    }
                    
    
                }
            break;

            case '/editcate':
                if(isset($_REQUEST['editcategory_id'])){
                    $id=$_REQUEST['editcategory_id'];
                    $where=array("id"=>$id);
                    $run=$this->select_where('category',$where);
                    $fetch=$run->fetch_object();
    
    
                    if(isset($_REQUEST['submit'])){
                    $category_name=$_REQUEST['category_name'];
                    $category_img=$_FILES['category_img']['name'];
                    $path="../upload/category/".$category_img;
                    $tmp_file=$_FILES['category_img']['tmp_name'];
                    move_uploaded_file($tmp_file,$path);
                    $updated_at=date('Y-m-d H:i:s');
                  //echo"<pre>";print_r($_REQUEST);exit;
    
                    $arr=array("category_name"=>$category_name,"category_img"=>$category_img,"updated_at"=>$updated_at);
                    $res=$this->update('category',$arr,$where);
                    // echo"<pre>";
                    // print_r($arr);
                    // exit;
                    if($res){
                        echo"<script>
                        
                            alert('Category update Success');
                            window.location='manage_cate';
                        
                            </script>"; 
                        }
    
                        
                }
            
                    }
                
                      
                    include_once('edit_cate.php');
                    break;

                case '/editprod':
                if(isset($_REQUEST['editproduct_id'])){
                    $id=$_REQUEST['editproduct_id'];
                    $where=array("id"=>$id);
                    $run=$this->select_where('products',$where);
                    $fetch=$run->fetch_object();
    
    
                    if(isset($_REQUEST['submit'])){
                    $product_name=$_REQUEST['product_name'];
                    $discount_price=$_REQUEST['discount_price'];
                    $main_price=$_REQUEST['main_price'];
                    $description=$_REQUEST['description'];

                    $product_img=$_FILES['product_img']['name'];
                    $path="../upload/products/".$product_img;
                    $tmp_file=$_FILES['product_img']['tmp_name'];
                    move_uploaded_file($tmp_file,$path);
                    $updated_at=date('Y-m-d H:i:s');
                  //echo"<pre>";print_r($_REQUEST);exit;
    
                    $arr=array("product_name"=>$product_name,"product_img"=>$product_img,"discount_price"=>$discount_price,"main_price"=>$main_price,"description"=>$description,"updated_at"=>$updated_at);
                    $res=$this->update('products',$arr,$where);
                    if($res){
                        echo"<script>
                        
                            alert('product update Success');
                            window.location='manage_prod';
                        
                            </script>"; 
                        }
    
                        
                }
            
                    }
    
                    
                  
                include_once('edit_prod.php');
                break;
        

       

        default:
        include_once('pagenotfound.php');
        break;
    }
}
}
$obj=new control;
?>