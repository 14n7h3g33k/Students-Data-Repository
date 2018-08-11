<button class="btn btn-primary"><a href="home.php">HOME</a></button>
<div align="center">
        <?php
        $conn=new mysqli('localhost','root','','sismodule');
        $regw=$_POST['prog'];
        $regr=$_POST['year'];
        $regt=$_POST['sem'];
        $sql= " SELECT * FROM 2ndyears WHERE programme='$regw'";
        $result = $conn->query( $sql);
        if($result->num_rows > 0)
        {
        if ($regw =='Informatics' && $regr=='2nd') {
        # code...
        ?>
        <div class="col">
<center><table width="50%" border="1">
<title>sis</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
  <?php
 if(isset($_GET['success']))
 {
  ?>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Problem While File Uploading !</label>
        <?php
 }
 else
 {
  ?>
        <?php
 }
 ?>
</div>
</body>
</html>

    <tr><td><b>INF 242 Database System II</b></td></tr>
    <tr>
    <td>File Name</td>
    <td>View</td>
    </tr>
  <?php
 $conn=new mysqli('localhost','root','','sismodule');
 $sql="SELECT * FROM inf242 ";
 $date= date('Y-m-d H:i:s');
 $result_set= mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($result_set))
 { 
  ?>      <tr>
        <td>
        <?php
         echo $row['file']; ?> </td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>
</table></center></div>

    <br /><br />

    <center><table width="50%" border="1">
<style type="text/css">
  @charset "utf-8";
/* CSS Document */

*
{
 padding:0;
 margin:0;
}
body
{
 background:#fff;
 font-family:Georgia, "Times New Roman", Times, serif;
 text-align:center;
}
#header
{
 background:#008000;
 width:100%;
 height:50px;
 color:#fff;
 font-size:36px;
 font-family:Verdana, Geneva, sans-serif;
}
#body
{
 margin-top:100px;
}
#body table
{
 margin:0 auto;
 position:relative;
 bottom:50px;
 max-width: 100%;
}
table td,th
{
 padding:20px;
 border: solid #9fa8b0 1px;
 border-collapse:collapse;
}
#footer
{
 text-align:center;
 position:absolute;
 left:0;
 right:0;
 margin:0 auto;
 bottom:50px;
}

</style>
<title>sis</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
    <?php
 if(isset($_GET['success']))
 {
  ?>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Problem While File Uploading !</label>
        <?php
 }
 else
 {
  ?>
        <?php
 }
 ?>
</div>
</body>
</html>
<style type="text/css">
  
</style>
    <tr><td><b>INF 245 Knowledge and Content Management</b></td></tr>
    <tr>
    <td>File Name</td>
    <td>View</td>
    </tr>
  <?php
 $conn=new mysqli('localhost','root','','sismodule');
 $sql="SELECT * FROM inf245 ";
 $date= date('Y-m-d H:i:s');
 $result_set= mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($result_set))
 {
  ?>    
        <tr>
        <td>
        <?php
         echo $row['file']; ?> </td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>

</table></center></div>
<?php
}
 if($regw=='Information Science' && $regr=='2nd') {
  ?>
<center><table width="50%" border="1">
<style type="text/css">
  @charset "utf-8";
/* CSS Document */

*
{
 padding:0;
 margin:0;
}
body
{
 background:#fff;
 font-family:Georgia, "Times New Roman", Times, serif;
 text-align:center;
}
#header
{
 background:#008000;
 width:100%;
 height:50px;
 color:#fff;
 font-size:36px;
 font-family:Verdana, Geneva, sans-serif;
}
#body
{
 margin-top:100px;
}
#body table
{
 margin:0 auto;
 position:relative;
 bottom:50px;
 max-width: 100%;
}
table td,th
{
 padding:20px;
 border: solid #9fa8b0 1px;
 border-collapse:collapse;
}
#footer
{
 text-align:center;
 position:absolute;
 left:0;
 right:0;
 margin:0 auto;
 bottom:50px;
}

</style>
      <tr><td><b>INS 201 SYSTEM ANALYSIS AND DESIGN</b></td></tr>
    <tr>
    <td>File Name</td>
    <td>View</td>
    </tr>
<?php
     $conn=new mysqli('localhost','root','','sismodule');
 $sql="SELECT * FROM ins201 ";
 $date= date('Y-m-d H:i:s');
 $result_set= mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($result_set))
 {
  ?>    
        <tr>
        <td>
        <?php
         echo $row['file']; ?> </td>
        <td><a href="uploadz/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>


</table></center></div>
<br><br><br>

<center><table width="50%" border="1">
<style type="text/css">
  @charset "utf-8";
/* CSS Document */

*
{
 padding:0;
 margin:0;
}
body
{
 background:#fff;
 font-family:Georgia, "Times New Roman", Times, serif;
 text-align:center;
}
#header
{
 background:#008000;
 width:100%;
 height:50px;
 color:#fff;
 font-size:36px;
 font-family:Verdana, Geneva, sans-serif;
}
#body
{
 margin-top:100px;
}
#body table
{
 margin:0 auto;
 position:relative;
 bottom:50px;
 max-width: 100%;
}
table td,th
{
 padding:20px;
 border: solid #9fa8b0 1px;
 border-collapse:collapse;
}
#footer
{
 text-align:center;
 position:absolute;
 left:0;
 right:0;
 margin:0 auto;
 bottom:50px;
}

</style>
      <tr><td><b>INS 210 DATA COMMUNICATION</b></td></tr>
    <tr>
    <td>File Name</td>
    <td>View</td>
    </tr>
<?php
     $conn=new mysqli('localhost','root','','sismodule');
 $sql="SELECT * FROM ins210 ";
 $date= date('Y-m-d H:i:s');
 $result_set= mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($result_set))
 {
  ?>    
        <tr>
        <td>
        <?php
         echo $row['file']; ?> </td>
        <td><a href="uploadd/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>

</table></center></div>
 <?php
}
else
{
  echo "<h1 align='center'>Courses will be uploaded soon<br>
                   <i>COME BACK AGAIN :-)</i></h1>";
                   ?>

     <br><br><br><br><br><br><br><br><br><br><br><br><p>&copy;Copyright<?php echo date('Y'); ?><br>Developed By<span><a href="#" target="-blank"> 14n7h3g33k</a></span></p><?php
}
}
else
{
  echo "<h1 align='center'>Courses will be uploaded soon<br>
                   <i>COME BACK AGAIN :-)</i></h1>";
                   ?>

     <br><br><br><br><br><br><br><br><br><br><br><br><p>&copy;Copyright<?php echo date('Y'); ?><br>Developed By<span><a href="#" target="-blank"> 14n7h3g33k</a></span></p><?php
}


