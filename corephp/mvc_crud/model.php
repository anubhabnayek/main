<?php
class model
{
    public $conn="";
    function __construct()
    {
      $this->conn=new mysqli('localhost','root','','mvc_crud');
    }
    function select($tbl)
    {
        $sel="SELECT * from $tbl";
        $res=$this->conn->query($sel);
        while($fetch=$res->fetch_object())
        {
        $array[]=$fetch;
        }
     if(!empty($array)){
        return $array;
     }
    //$array=array("name"=>"Anubhab","email"=>"anubhab@gmail.com","password"=>"1234");
    }
       
    function insert($tbl,$array)
        {
            $key_arr=array_keys($array); //key find of arr array("0"=>"name","1"=>"email","2"=>"password")
            $col_str=implode(",",$key_arr); //array to string

            $value_arr=array_values($array);
            $value_str=implode("','",$value_arr);
            $ins="INSERT into $tbl($col_str) values('$value_str')";
            $res=$this->conn->query($ins);
            return $res;


          }
        function select_where($tbl,$where)
          {
            $col=array_keys($where);
            $value=array_values($where);

            $sel="SELECT * from $tbl where 1=1";
            $i=0;
            foreach($where as $c)
            {
            $sel.=" and $col[$i]='$value[$i]'";
            $i++;
            }
            $res=$this->conn->query($sel);
            return $res;
           }
        //update student set name="anubhab nayek",email="anubhab@gmail.com",phone="3434567659" where id=1;
        function update($tbl,$arr,$where)
         {	

        $col=array_keys($arr); //array("0"=>"name","1"=>"email","3"=>"phone")
        $value=array_values($arr); //array("0"=>"name","1"=>"email","3"=>"phone")

        $upd="update $tbl set"; //query
        $j=0;
        $count=count($arr);
        foreach($arr as $w)
        {
        if($count==$j+1){
         $upd.=" $col[$j]='$value[$j]'";
       /*echo $sel;
            exit;*/}
            else{
        $upd.=" $col[$j]='$value[$j]',";
        $j++;
            }
        
        }
        $colw=array_keys($where);
        $valuew=array_values($where);
        $upd.=" where 1=1";
        $i=0;
        foreach($where as $w)
        {
         echo $upd.=" and $colw[$i]='$valuew[$i]'";
        $i++;
         }
        $res=$this->conn->query($upd);
        //echo"<pre>";print_r($res);exit;
        return $res;
        }


    
            
        function delete_where($tbl,$where)
           {

        $col=array_keys($where);
        $value=array_values($where);

        $del="delete from $tbl where 1=1"; //query
        $i=0;
        foreach($where as $w)
        {
       echo $del.=" and $col[$i]='$value[$i]'";
        $i++;
        }
        $res=$this->conn->query($del);
        return $res;
        }
      }
  $obj=new model;
  ?>