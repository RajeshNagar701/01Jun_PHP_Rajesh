<?php

include_once('model.php');  // step 1 load model

class control extends model // step 2 extends 
{
	// magic function that call automatecally when you declare class object
	function __construct()
	{
		
		session_start();
		
		model::__construct(); // step 3 call mopdel __construct
		
		date_default_timezone_set('asia/calcutta');
		
		$url=$_SERVER['PATH_INFO'];
		switch($url)
		{
			case '/index':
			include_once('index.php');
			break;
			
			case '/about':
			include_once('about.php');
			break;
			
			case '/medicine':
			include_once('medicine.php');
			break;
			
			case '/buy':
			include_once('buy.php');
			break;
			
			case '/news':
			include_once('news.php');
			break;
			
			case '/contact':
			
			if(isset($_REQUEST['submit']))
			{
				$name=$_REQUEST['name'];
				$email=$_REQUEST['email'];
				$message=$_REQUEST['message'];
				
				$created_at=date("Y-m-d H:i:s");
				$updated_at=date("Y-m-d H:i:s");
				
				$arr=array("name"=>$name,"email"=>$email,"message"=>$message,"created_at"=>$created_at,"updated_at"=>$updated_at);
				
				$res=$this->insert('contacts',$arr);
				if($res)
				{
					
					echo "<script> 
						alert('Contact Inquiry Registered Success'); 
					</script>";
				}
				else
				{
					echo "<script> 
						alert('Failed'); 
					</script>";
				}	
				
			}
			
			include_once('contact.php');
			break;
			
			case '/login':
			if(isset($_REQUEST['submit']))
			{
				
				$email=$_REQUEST['email'];
				$password=md5($_REQUEST['password']); // password encrypted
				
				$where=array("email"=>$email,"password"=>$password);
				
				$res=$this->select_where('customers',$where);
				
				$chk=$res->num_rows;  // condition res check by rows
				
				if($chk==1) // 1 means true 
				{
					$fetch=$res->fetch_object();
					
					$status=$fetch->status;
					if($status=="Unblock")
					{
						$_SESSION['user']=$fetch->email;
						$_SESSION['name']=$fetch->name;
						$_SESSION['uid']=$fetch->uid;
						
						echo "<script> 
							alert('customers Login Success'); 
							window.location='index';
						</script>";
					}
					else
					{
						echo "<script> 
							alert('Login failed due to Blocked Account'); 
							window.location='login';
						</script>";
					}
					
				}
				else
				{
					echo "<script> 
						alert('Login Failed Failed'); 
					</script>";
				}	
				
			}
			
			include_once('login.php');
			break;
			
			case '/logout':
				unset($_SESSION['user']);
				unset($_SESSION['name']);
				unset($_SESSION['uid']);
			echo "<script> 
						alert('customers Logout Success'); 
						window.location='index';
					</script>";
			break;
			
			
			
			case '/pofile':
			
			$where=array("uid"=>$_SESSION['uid']);
			$res=$this->select_where('customers',$where);
			$fetch=$res->fetch_object();
			
			include_once('profile.php');
			break;
			
			
			case '/edituser':
			$countries_arr=$this->select('countries');
			if(isset($_REQUEST['edituid']))
			{
				$uid=$_REQUEST['edituid'];
				$where=array("uid"=>$uid);
				$run=$this->select_where('customers',$where);
				$fetch=$run->fetch_object();
				
				$userfile=$fetch->file;
				
				if(isset($_REQUEST['save']))
				{
					$name=$_REQUEST['name'];
					$gender=$_REQUEST['gender'];					
					$launguages_arr=$_REQUEST['launguages']; // lag arr convert into string
					$launguages=implode(",",$launguages_arr);

					$cid=$_REQUEST['cid'];
					$updated_at=date("Y-m-d H:i:s");	
					
					if($_FILES['file']['size']>0)
					{
						// img upload
						$file=$_FILES['file']['name'];
						$path='upload/customers/'.$file; // path
						$tmp_file=$_FILES['file']['tmp_name'];
						move_uploaded_file($tmp_file,$path);
						
						$arr=array("name"=>$name,"gender"=>$gender,"launguages"=>$launguages,"cid"=>$cid,"file"=>$file,"updated_at"=>$updated_at);
					
						$res=$this->update('customers',$arr,$where); 
						if($res)
						{
							unlink('upload/customers/'.$userfile);
							echo "<script> 
								alert('customers Update Success');
								window.location='pofile';
							</script>";
						}
					}
					else
					{
						$arr=array("name"=>$name,"gender"=>$gender,"launguages"=>$launguages,"cid"=>$cid,"updated_at"=>$updated_at);
						$res=$this->update('customers',$arr,$where); 
						if($res)
						{
							echo "<script> 
								alert('customers Update Success');
								window.location='pofile';
							</script>";
						}	
					}
					
					
					
				}
				
				
			}
			include_once('edituser.php');
			break;
			
			case '/signup':
			$countries_arr=$this->select('countries');
			if(isset($_REQUEST['submit']))
			{
				$name=$_REQUEST['name'];
				$email=$_REQUEST['email'];
				$password=md5($_REQUEST['password']); // password encrypted
				$gender=$_REQUEST['gender'];
				
				$launguages_arr=$_REQUEST['launguages']; // lag arr convert into string
				$launguages=implode(",",$launguages_arr);
				
				$cid=$_REQUEST['cid'];
				
				// img upload
				$file=$_FILES['file']['name'];
				$path='upload/customers/'.$file; // path
				$tmp_file=$_FILES['file']['tmp_name'];
				move_uploaded_file($tmp_file,$path);
				
				$created_at=date("Y-m-d H:i:s");
				$updated_at=date("Y-m-d H:i:s");
				
				$arr=array("name"=>$name,"email"=>$email,"password"=>$password,"gender"=>$gender,"launguages"=>$launguages,"cid"=>$cid,"file"=>$file,"created_at"=>$created_at,"updated_at"=>$updated_at);
				
				$res=$this->insert('customers',$arr);
				if($res)
				{
					echo "<script> 
						alert('customers Registered Success'); 
					</script>";
				}
				else
				{
					echo "<script> 
						alert('Failed'); 
					</script>";
				}	
				
			}
			
			include_once('signup.php');
			break;	

			default:
			include_once('pagenotfound.php');
			break;		
		}
	}
}

$obj=new control;
?>