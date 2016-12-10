<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

<title>Student Roster</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	  <link href="css/style.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/dataTables.tableTools.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
    <script src="js/dataTables.tableTools.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>

<script>
 $(document).ready( function () {
    $("#myTable").dataTable( {
        "dom": '<"clear">f',
        "paging": false,
        "searching": true,
    } );
} );
 </script>


</head>

<body>
  <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="student-roster.php">Student Roster<span class="sr-only">(current)</span></a></li>
          <li><a href="student-grade.php">Student Grade</a></li>
          <li><a href="exam-question-average.php">Exam Question Average</a></li>
          <li><a href="student-exam-history.php">Student Exam History</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <script>
  function showUser(str) {
      if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtHint").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","getstudent.php?q="+str,true);
          xmlhttp.send();
      }
  }
  </script>

      <?php
	include 'login.php';
	// connect to server and test if successful
	$connection = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if(mysqli_connect_error()){
        die("Database Connection Failed: " .
                mysqli_connect_error() .
                " (" . mysqli_connect_errno() . ")"
);
}

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT DISTINCT courseID from mjb34.COURSESECTION where facultyID = '$username'";



while ($row = mysqli_fetch_array($result)) {
  // Print out the contents of the entry
  $rowIDString = (string)$rowIDNumber;
  echo '<tr id="' . $rowIDString . '">';
  echo '<td>' . $row['Course'] . '</td>';
  echo '<td>' . $row['Section'] . '</td>';
  echo '<td>' . $row['Instructor'] . '</td>';
  echo '<td>' . $row['Seats Left'] . '</td>';
?>


<form>
<select name="users" onchange="showUser(this.value)">
  <option value=""><?php echo ['Course']?></option>
  <option value="1">Peter Griffin</option>
  <option value="2">Lois Griffin</option>
  <option value="3">Joseph Swanson</option>
  <option value="4">Glenn Quagmire</option>
  </select>
</form>
              <br/>



  </div><!-- /container -->



</body>
</html>
