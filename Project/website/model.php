<?php
class model
{
	public $conn="";
	function __construct()
	{						//   server     username  passs db_name
		$this->conn=new Mysqli('localhost','root','','medicalshop'); 
	}
	
	function select($tbl)
	{
		echo $sel="select * from $tbl";  // query
		$res=$this->conn->query($sel);  // run
		
		while($fetch=$res->fetch_object()) // fetch all datta from db
		{
			$arr[]=$fetch;
		}
		if(!empty($arr))
		{
			return $arr;
		}
	}
	
	function select_where($tbl,$where)
	{
		$col=array_keys($where);
		$value=array_values($where); 
		
		$sel="select * from $tbl where 1=1";  // query
		$i=0;
		foreach($where as $w)
		{
			$sel.=" and $col[$i]='$value[$i]'";
			$i++;	
		}
		$res=$this->conn->query($sel);  // run

		return $res;

	}
	
	function delete_where($tbl,$where)
	{
		$col=array_keys($where);
		$value=array_values($where); 
		
		$del="delete from $tbl where 1=1";  // query
		$i=0;
		foreach($where as $w)
		{
			$del.=" and $col[$i]='$value[$i]'";
			$i++;	
		}
		$res=$this->conn->query($del);  // run

		return $res;

	}
	
	
	// $arr=array("name"=>"Rajesh","email"=>"raj@gmail.com","password"=>"1234");
	
	function insert($tbl,$arr) 
	{
		$key_arr=array_keys($arr); // key find of arr array("0"=>"name","1"=>"email","2"=>"password")
		$col_str=implode(",",$key_arr);// array to string  (name,email,password)
		
		$value_arr=array_values($arr); 
		$value_str=implode("','",$value_arr);  // ('rajesh','raj@gmail.com','1234')
		
		echo $ins="insert into $tbl ($col_str) values ('$value_str')";  // query
		$res=$this->conn->query($ins);  // run
		return $res;
		
	}
	
	function update($tbl,$arr,$where) 
	{
		$col=array_keys($arr); // key find of arr array("0"=>"name","1"=>"email","2"=>"password")
		$value=array_values($arr); 
		
		$upd="update $tbl set";  // query
		
		$j=0;
		$count=count($arr);
		foreach($arr as $w)
		{
			if($count==$j+1)
			{
				$upd.=" $col[$j]='$value[$j]'";
			}
			else
			{
				$upd.=" $col[$j]='$value[$j]',";
				$j++;
			}
		}
		
		$colw=array_keys($where);
		$valuew=array_values($where); 
		$upd.=" where 1=1";  // query
		$i=0;
		foreach($where as $w)
		{
			echo $upd.=" and $colw[$i]='$valuew[$i]'";
			$i++;	
		}
		
		$res=$this->conn->query($upd);  // run
		return $res;
		
	}
	
	
	
}
$obj=new model;

?>