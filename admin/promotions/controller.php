
<?php
require_once ("../../include/initialize.php");
 	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }


$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;

 
	}
   
	function doInsert(){
		if(isset($_POST['save'])){


		if ( $_POST['subject'] == "" || $_POST['message'] == "" ) {
			$messageStats = false;
			message("All fields are required!","error");
			redirect('index.php?view=add');
		}else{	
			/*$promotion = New Promotion();
			$promotion->subject	= $_POST['subject'];
			$promotion->message 	= $_POST['message']; 
			$promotion->create();*/

			$notifier2 = new EmailNotifier2();
			$notifier2->sendEmails2($_POST['message']);

			message("Promotion message sent successfully!", "success");
			redirect("index.php");	
		}
		}

	}
?>