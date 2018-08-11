<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['userName']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.php">Students Repository</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Home</a></li>
           
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['userName']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 
    
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <br><br><br><br><br><br>
      <div class="text-center">
      <img src="logo.png" alt="Students Repository" style="height: auto;width:auto;" " >
      </div>
      <br><br>   
      <section>
      <div class="col-md-10 col-md-offset-1"  style="background :" >
      
        <div class="container" >
          <div class="col-md-12">
            
                

              <form action="home.php" method="POST" id="register-form"  >
              <div class="row">
                <div class="col-md-12">
                <div class="col-md-3">
                <div class="col-md-10 col-md-offset-1 form-group">
                                   <label style="border-color: #4CAF50"><b>Programme</b></label>:
                                    <select name="prog" class="form-control login-field" id="login-form" required >
                                  <option value="" selected>Select</option>
                                  <option value="Informatics" >Informatics</option>
                                  <option value="Media Science" >Media Science</option>
                                  <option value="Information Science" >Information Science</option>
                                  </select>
                                </div>
                                </div>
                <div class="col-md-3">
                <div class="col-md-6 col-md-offset-6 form-group">
                                   <label style="border-color: #4CAF50"><b>Year</b></label>:
                                    <select name="year" class="form-control login-field" id="login-form" required >
                                  <option value="" selected>Select</option><br>
                                  <option value="1st" >1st</option>
                                  <option value="2nd" >2nd</option>
                                  <option value="3rd" >3rd</option>
                                  <option value="4th" >4th</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="col-md-6 col-md-offset-6 form-group">
                                <label style="border-color: #4CAF50"><b>Semester</b></label>:
                                    <select name="sem" class="form-control login-field" id="login-form" required >
                                  <option value="" selected>Select</option><br>
                                  <option value="1" >1</option>
                                  <option value="2" >2</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-3">
                               <div class="form-group">
                  <br><input style="background-color: #4CAF50;border-color: #4CAF50" type="submit" name="btn-register" class="col-md-4 col-md-offset-4 btn btn-primary btn-small" value="search" />
                 </div>
              </div>
              </div>
              </div>
                
              </form>
            </div>
          </div>
        </div>
      </section>
    
    </div>
      <script type="text/javascript" src="js/jquery2.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/jquery.validate.min.js"></script>
      <script type="text/javascript" src="js/register.js"></script>
</body>
  </html>
<br><br><br><br><br><br><br><br>

   
<?php ob_end_flush(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
   <script type="text/javascript" src="js/jquery2.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/jquery.validate.min.js"></script>
      <script type="text/javascript" src="js/register.js"></script>

</head>
<style>
#books {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    table-layout: fixed;
    width: 50%;
}

#books td, #books th {
    border: 1px solid #ddd;
    padding: 8px;
}

#books tr:nth-child(even){background-color: #f2f2f2;}

#books tr:hover {background-color: #ddd;}

#books th {
    padding-top: 12%;
    padding-bottom: 12%;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
#display {
    display: inline-block;
    width: 100%;
    height: 100%;
    margin-left:15%;
    overflow: hidden;
}
</style>
<body>
 <?php
        $conn=new mysqli('localhost','root','','sismodule');
        $regw=$_POST['prog'];
        $regr=$_POST['year'];
        $regt=$_POST['sem'];
        $sql= " SELECT * FROM 2ndyears WHERE programme='$regw'";
        $result = $conn->query( $sql);
        if($result->num_rows > 0) {
            if ($regw == 'Informatics' && $regr == '2nd' && $regt == '2') {
                # code...
                ?>
                <div id="display">
                    <a href="#inf242" class="btn btn-info" data-toggle="collapse" style="background-color: #4CAF50;border-color: #4CAF5">DATABASE SYSTEMS II</a>
                    <div id="inf242" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>INF 242 Database System II</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM inf242 ";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysqli_error()); // TODO: better error handling
                                }
                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td>
                                        <a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a>
                                    </td>
                                     <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>

                                    <?php
                                    }
                                    ?>

                                </tr>

                        </div>
                        </table>
                    </div>
                </div>
                </div>

                <br/><br/><br/><br/>
                </div>
                </div>
                <div id="display">

                    <a href="#inf245" class="btn btn-info" data-toggle="collapse" style="background-color: #4CAF50;border-color: #4CAF5">KNOWLEDGE & CONTENT MANAGEMENT</a>
                    <div id="inf245" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>INF 245 Knowledge & Content Management</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM inf245 ";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysqli_error()); // TODO: better error handling
                                }
                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                                    <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>

                                    <?php
                                    }
                                    ?>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                </div>

                <br/><br/><br/><br/>
                </div>
                </div>
                <div id="display">

                    <a href="#inf243" class="btn btn-info" data-toggle="collapse" style="background-color: #4CAF50;border-color:  #4CAF5;">FUNDAMENTALS OF ARTIFICIAL INTELLIGENCE</a>
                    <div id="inf243" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>INF 243 Fundamentals of Artificial Intelligence</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM inf243 ";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysql_error()); // TODO: better error handling
                                }

                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                                    <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                </div>


                <?php
            }
        ;
            ?>
            <?php

            if ($regw == 'Informatics' && $regr == '2nd' && $regt == '1') {
                ?>
                
                <div id="display">
                    <a href="#inf210" class="btn btn-info" data-toggle="collapse" style="background-color: #4CAF50;border-color: #4CAF5">DATA STRUCTURES AND ALGORITHMS I</a>
                    <div id="inf210" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>INF 210 Data Structures & Algorithms 1</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM inf210 ";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysqli_error()); // TODO: better error handling
                                }
                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                                    <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>
                                    <?php
                                    }
                                    ?>

                        </div>
                        </table>
                    </div>
                </div>
                </div>

                <br/><br/><br/><br/>
                </div>
                </div>
                <div id="display">

                    <a href="#inf211" class="btn btn-info" data-toggle="collapse" style="background-color: #4CAF50;border-color: #4CAF5">BUSINESS SYSTEMS MODELLING</a>
                    <div id="inf211" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>INF 211 Business Systems Modelling</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM inf211 ";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysqli_error()); // TODO: better error handling
                                }
                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                                     <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>

                                    <?php
                                    }
                                    ?>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                </div>

                <br/><br/><br/><br/>
                </div>
                </div>
                <div id="display">

                    <a href="#inf230" class="btn btn-info" data-toggle="collapse" style="background-color: #4CAF50;border-color: #4CAF5">PROGRAMMING FOR THE INTERNET AND
                        MOBILE DEVICES I</a>
                    <div id="inf230" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>INF 230 Programming for The Internet & Mobile Devices</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM inf230";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysqli_error()); // TODO: better error handling
                                }

                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                                    <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
                <?php
            };

            ?>
            <?php

            if ($regw == 'Information Science' && $regr == '2nd' && $regt == '1') {
                ?>
                
                <div id="display">
                    <a href="#ins201" class="btn btn-info" data-toggle="collapse" style="background-color: #4CAF50;border-color: #4CAF5">SYSTEMS ANALYSIS AND DESIGN</a>
                    <div id="ins201" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>INS 201 Systems Analysis & Design</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM ins201 ";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysqli_error()); // TODO:better error handling
                                }
                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                                     <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                        </div>
                        </table>
                    </div>
                </div>
                </div>

                <br/><br/><br/><br/>
                </div>
                </div>
                <div id="display">

                    <a href="#ins202" class="btn btn-info" data-toggle="collapse" style="background-color: #4CAF50;border-color:#4CAF5">OPERATING SYSTEMS THEORY</a>
                    <div id="ins202" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>INS 202 Operating Systems Theory</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM ins202 ";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysqli_error()); // TODO: better error handling
                                }
                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                                     <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>

                                    <?php
                                    }
                                    ?>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                </div>

                <br/><br/><br/><br/>
                </div>
                </div>
                <div id="display">

                    <a href="#ins203" class="btn btn-info" data-toggle="collapse"style="background-color: #4CAF50;border-color: #4CAF5">SECTORAL SERVICES SYSTEMS AND SERVICES</a>
                    <div id="ins203" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>INS 203 Sectoral Services Systems & Services</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM ins203";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysqli_error()); // TODO: better error handling
                                }

                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                                     <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>
                                    <?php
                                    }
                                    ?>

                            </table>
                        </div>
                    </div>
                </div>
                </div>


                <?php
            };

            ?>
            <?php
              if ($regw == 'Information Science' && $regr == '2nd' && $regt == '2') {
                ?>
                
                <div id="display">
                    <a href="#ins210" class="btn btn-info" data-toggle="collapse"style="background-color: #4CAF50;border-color: #4CAF5">DATA COMMUNICATION</a>
                    <div id="ins210" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>INS 210 Data Communication</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM ins210 ";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysqli_error()); // TODO:better error handling
                                }
                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                                     <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                        </div>
                        </table>
                    </div>
                </div>
                </div>

                <br/><br/><br/><br/>
                </div>
                </div>
                <div id="display">

                    <a href="#ins211" class="btn btn-info" data-toggle="collapse"style="background-color: #4CAF50;border-color: #4CAF5">DATABASE CONSTRUCTION AND MANAGEMENT</a>
                    <div id="ins211" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>INS 211 Database Communication</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM ins211 ";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysqli_error()); // TODO: better error handling
                                }
                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                                    <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>

                                    <?php
                                    }
                                    ?>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                </div>

                <br/><br/><br/><br/>
                </div>
                </div>
                <div id="display">

                    <a href="#ins212" class="btn btn-info" data-toggle="collapse"style="background-color: #4CAF50;border-color: #4CAF5">PRINCIPLES AND PRACTICES OF MANAGEMENT</a>
                    <div id="ins212" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>INS 212 Principles & Practices of Management</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM ins212";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysqli_error()); // TODO: better error handling
                                }

                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                                    <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
                <?php
            };

            ?>
             <?php
              if ($regw == 'Media Science' && $regr == '2nd' && $regt == '1') {
                ?>
                
                <div id="display">
                    <a href="#mes210" class="btn btn-info" data-toggle="collapse"style="background-color: #4CAF50;border-color: #4CAF5">MASS MEDIA THEORIES</a>
                    <div id="mes210" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>MES 210 Mass Media Theories</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM mes210 ";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysqli_error()); // TODO:better error handling
                                }
                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                                     <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                             </div>
                        </table>
                    </div>
                </div>
                </div>

                <br/><br/><br/><br/>
                </div>
                </div>
                <div id="display">

                    <a href="#mes211" class="btn btn-info" data-toggle="collapse"style="background-color: #4CAF50;border-color: #4CAF5">INTRODUCTION TO DIGITAL MEDIA</a>
                    <div id="mes211" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>MES 211 Introduction to Digital Media</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM mes211 ";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysqli_error()); // TODO: better error handling
                                }
                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>

                                     <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                </div>

                <br/><br/><br/><br/>
                </div>
                </div>
                <div id="display">

                    <a href="#mes212" class="btn btn-info" data-toggle="collapse"style="background-color: #4CAF50;border-color: #4CAF5">USE OF COMPUTERS IN THE MEDIA</a>
                    <div id="mes212" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>MES 212 Use of Computers in The Media</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM mes212";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysqli_error()); // TODO: better error handling
                                }

                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                                     <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                </div>


                <?php
            };

            ?>
            <?php
              if ($regw == 'Media Science' && $regr == '2nd' && $regt == '2') {
                ?>
                
                <div id="display">
                    <a href="#mes220" class="btn btn-info" data-toggle="collapse"style="background-color: #4CAF50;border-color: #4CAF5">INTRODUCTION TO PHOTOGRAPHY AND VIDEOGRAPHY</a>
                    <div id="mes220" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>MES 220 Introduction to photography & videography</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM mes220 ";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysqli_error()); // TODO:better error handling
                                }
                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                                     <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>
                                    <?php
                                    }
                                    ?>

                        </div>
                        </table>
                    </div>
                </div>
                </div>

                <br/><br/><br/><br/>
                </div>
                </div>
                <div id="display">

                    <a href="#mes221" class="btn btn-info" data-toggle="collapse"style="background-color: #4CAF50;border-color: #4CAF5">INTRODUCTION TO ANALOGUE AND DIGITAL BROADCASTING TECHNOLOGY</a>
                    <div id="mes221" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>MES 221 Introduction to Analogue & Digital Broadcasting Technology</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM mes221 ";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysqli_error()); // TODO: better error handling
                                }
                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>

                                     <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>
                                    <?php
                                    };
                                    ?>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                </div>

                <br/><br/><br/><br/>
                </div>
                </div>
                <div id="display">

                    <a href="#mes223" class="btn btn-info" data-toggle="collapse"style="background-color: #4CAF50;border-color: #4CAF5">COMPUTERS FOR INFORMATION RESOURCE MANAGEMENT</a>
                    <div id="mes223" class="collapse">
                        <div align="justify">


                            <div class="col"></div>
                            <table id="books">

                                <tr>
                                    <td><b>MES 223 Computers for Information Resource Management</b></td>
                                </tr>
                                <tr>
                                    <td>File Name</td>
                                    <td>View</td>
                                    <td>Upload Date</td>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sismodule');
                                $sql = "SELECT * FROM mes223";
                                $date = date('Y-m-d H:i:s');
                                $result_set = mysqli_query($conn, $sql);
                                if ($result_set === FALSE) {
                                    die(mysqli_error()); // TODO: better error handling
                                }

                                while ($row = mysqli_fetch_array($result_set)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['file']; ?> </td>
                                    <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                                     <td>
                                        <?php
                                        $date_uploaded = strtotime($row['date_uploaded']);
                                        echo "" .date('F j, Y, g:i a',$date_uploaded)
                                        ?>
                                    </td>
                                    <?php
                                    };
                                    ?>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                </div>



                <?php
            };

            ?>
            <?php
            };
 ?>
</body>
</html>
