<?php
	ob_start();
	session_start();
	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}
	include_once 'dbconnect.php';

	$error = false;

	if ( isset($_POST['btn-signup']) ) {
		
		// clean user inputs to prevent sql injections
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);

        $national_id = trim($_POST['national_id']);
        $national_id = strip_tags($national_id);
        $national_id = htmlspecialchars($national_id);
        
        $student_id = trim($_POST['student_id']);
        $student_id = strip_tags($student_id);
        $student_id = htmlspecialchars($student_id);
		
        $programme = trim($_POST['programme']);
        $programme = strip_tags($programme);
        $programme = htmlspecialchars($programme);

        $study_year = trim($_POST['study_year']);
        $study_year = strip_tags($study_year);
        $study_year = htmlspecialchars($study_year);
        
        
        $Telephone = trim($_POST['Telephone']);
        $Telephone = strip_tags($Telephone);
        $Telephone = htmlspecialchars($Telephone);
        
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		
		// basic name validation
		if (empty($name)) {
			$error = true;
			$nameError = "Please enter your full name.";
		} else if (strlen($name) < 3) {
			$error = true;
			$nameError = "Name must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			$error = true;
			$nameError = "Name must contain alphabets and space.";
		}
		
        // basic national id validation
        if (empty($national_id)) {
            $error = true;
            $national_idError = "Please enter your national_id.";
        } else if (strlen($national_id) < 7) {
            $error = true;
            $national_idError = " ID must have atleat 8 characters.";
        } else if (!preg_match("/^[1-9][0-9]{0,15}$/",$national_id)) {
            $error = true;
            $national_idError = "ID must contain numerals";
        }else {
            // check national id exist or not
            $query = "SELECT national_id FROM users WHERE national_id='$national_id'";
            $result = mysql_query($query);
            $count = mysql_num_rows($result);
            if($count!=0){
                $error = true;
                $national_idError = "Provided national_id is already in use.";
            }
        }
         // basic student id validation
        if (empty($student_id)) {
            $error = true;
            $student_idError = "Please enter your student_id.";
        } else if (strlen($student_id) < 7) {
            $error = true;
            $student_idError = " ID must have atleat 8 characters.";
        } else if (!preg_match("/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/",$student_id)) {
            $error = true;
            $student_idError = "ID must contain specified notation";
        }else {
            // check student id exist or not
            $query = "SELECT student_id FROM users WHERE student_id='$student_id'";
            $result = mysql_query($query);
            $count = mysql_num_rows($result);
            if($count!=0){
                $error = true;
                $student_idError = "The student is already registered.";
            }
        }
         // basic programme validation
        if (empty($programme)) {
            $error = true;
            $programmeError = "Please enter the programme you are taking";
        } else if (strlen($programme) < 7) {
            $error = true;
            $programmeError = " The programme name is incomplete";
        } else if (!preg_match("/^[a-zA-Z ]+$/",$programme)) {
            $error = true;
            $ProgrammeError = "Programme name must contain alphabets only";
        }
         // basic Study year validation
        if (empty($study_year)) {
            $error = true;
            $study_yearError = "Please enter your year of study";
        } else if (strlen($study_year) > 1 ) {
            $error = true;
            $study_yearError = " Your year of study does not exist";
        } else if (!preg_match("/^[1-4]{1,4}$/",$study_year)) {
            $error = true;
            $study_yearError = "The year you have entered is invalid";
        }

          // basic telephone validation
        if (empty($Telephone)) {
            $error = true;
            $TelephoneError = "Please enter your Telephone No.";
        } else if (strlen($Telephone) < 10) {
            $error = true;
            $TelephoneError = " The number you have entered is incomplete";
        } else if (!preg_match("/^[0-9]{0,15}$/",$Telephone)) {
            $error = true;
            $TelephoneError = "The number you have entered is invalid";
        }
        else {
            // check telephone no exist or not
            $query = "SELECT Telephone FROM users WHERE Telephone='$Telephone'";
            $result = mysql_query($query);
            $count = mysql_num_rows($result);
            if($count!=0){
                $error = true;
                $TelephoneError = "Provided Telephone no is already in use.";
            }
        }
		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		} else {
			// check email exist or not
			$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		}
		// password validation
		if (empty($pass)){
			$error = true;
			$passError = "Please enter password.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Password must have atleast 6 characters.";
		}
		
		// password encrypt using SHA256();
		$password = hash('sha256', $pass);
		
		// if there's no error, continue to signup
		if( !$error ) {
			
			$query = "INSERT INTO users(userName,userEmail,userPass,national_id,student_id,programme,study_year ,Telephone) VALUES('$name','$email','$password','$national_id','$student_id','$programme','$study_year','$Telephone')";
			$res = mysql_query($query);

			if ($res) {
				$errTyp = "success";
				$errMSG = "Successfully registered, you may login now";
				unset($name);
				unset($email);
				unset($pass);
                unset($national_id);
                unset($student_id);
                unset($programme);
                unset($study_year);
                unset($Telephone);
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}	
				
		}
		
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>STUDENTS REPOSITORY - Login & Registration </title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">Sign Up into the System</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>

             <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></span>
            	<input type="number" name="national_id" class="form-control" placeholder="Enter National Id / Passport No " maxlength="50" value="<?php echo $national_id ?>" />
                </div>
                <span class="text-danger"><?php echo $national_idError; ?></span>
            </div>

             <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></span>
            	<input type="text" name="student_id" class="form-control" placeholder="Enter Student Id            eg: IS_10_16" maxlength="50" value="<?php echo $student_id ?>" />
                </div>
                <span class="text-danger"><?php echo $student_idError; ?></span>
            </div>
            <div class="row">
		  <div class="col-md-14">
		  <div class="col-md-7">
		  <div class=" form-group">
			 <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-education"></span></span>
               <input type="text" name="programme" class="form-control" placeholder="Enter Programme." maxlength="80" value="<?php echo $programme ?>" />
                </div>
                <span class="text-danger"><?php echo $programmeError; ?></span>
                </div>
            </div>
            </div>
		  <div class="col-md-5">
			<div class="form-group">
                <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-book"></span></span>
               <input type="number" name="study_year" class="form-control" placeholder=" Study year" maxlength="20" value="<?php echo $study_year ?>" />
                </div>
                <span class="text-danger"><?php echo $study_yearError; ?></span>
                </div>
            </div>
            </div>
            </div>
            </div>

               <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
               <input type="tel" name="Telephone" class="form-control" placeholder="Enter Telephone No." maxlength="40" value="<?php echo $Telephone ?>" />
                </div>
                <span class="text-danger"><?php echo $TelephoneError; ?></span>
            	</div>
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<a href="index.php">Sign in Here...</a>
            	
            </div>
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>