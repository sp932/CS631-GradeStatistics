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
        function showYears(studentID) {
            if (studentID == "") {
                document.getElementById("years").style.display = "hidden";
                document.getElementById("years").innerHTML = "";
                return;
            }

            else {
                sessionStorage.studentID = studentID;
                document.getElementById("years").style.display = "visible";
                if (window.XMLHttpRequest) {

                    // code for IE7+, Firefox, Chrome, Opera, Safari

                    xmlhttp = new XMLHttpRequest();

                }
                else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("years").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","getYears.php?sid="+studentID,true);
                xmlhttp.send();
            }
        }
    
    function showTypes(year) {
            if (year == "") {
                document.getElementById("types").style.display = "hidden";
                document.getElementById("types").innerHTML = "";
                return;
            }

            else {
                sessionStorage.year = year;
                document.getElementById("types").style.display = "visible";
                if (window.XMLHttpRequest) {

                    // code for IE7+, Firefox, Chrome, Opera, Safari

                    xmlhttp = new XMLHttpRequest();

                }
                else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("types").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","getTypes.php?sid="+sessionStorage.studentID+"&year="+year,true);
                xmlhttp.send();
            }
        }
    function showKeyword(type) {
            if (type == "") {
                document.getElementById("keyword").style.display = "hidden";
                document.getElementById("keyword").innerHTML = "";
                return;
            }

            else {
                sessionStorage.type = type;
                document.getElementById("keyword").style.display = "visible";
                if (window.XMLHttpRequest) {

                    // code for IE7+, Firefox, Chrome, Opera, Safari

                    xmlhttp = new XMLHttpRequest();

                }
                else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("keyword").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","getKeyword.php?sid="+sessionStorage.studentID+"&year="+sessionStorage.year+"&type=+"+type,true);
                xmlhttp.send();
            }
        }
    function showExamHistory(keyword) {
            if (keyword == "") {
                keyword = "ALL";
            }

            else {
                sessionStorage.keyword = keyword;
                document.getElementById("examHistory").style.display = "visible";
                if (window.XMLHttpRequest) {

                    // code for IE7+, Firefox, Chrome, Opera, Safari

                    xmlhttp = new XMLHttpRequest();

                }
                else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("examHistory").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","getExamHistory.php?sid="+sessionStorage.studentID+"&year="+sessionStorage.year+"&type="+sessionStorage.type+"&keyword="+keyword,true);
                xmlhttp.send();
            }
        }

        


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
          <?php echo '<li><a href="student-roster.php?username=' . $_GET[username] . '">Student Roster</a></li>' ?>
            <?php echo '<li><a href="student-grade.php?username=' . $_GET[username] . '">Student Grade</a></li>' ?>
            <?php echo '<li><a href="exam-question-average.php?username=' . $_GET[username] . '">Exam Question Average</a></li>' ?>
          <li class="active"><a href="student-exam-history.php">Student Exam History<span class="sr-only">(current)</span></a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
    
    <h3><center><strong>Student Exam History</strong></center></h3>
  <h5><center><strong>User the form below to obtain a history of exams a student took a certain year </strong></center></h5>

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

$username = $_GET['username'];
$query = "SELECT studentID from STUDENTS";


?>
    <center>
    <form>
<!--        <select name="users">-->
        <select name="users" onchange="showYears(this.value)">
            <option value="">Select a Student:</option>
            <?php
            echo $query;
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_array($result)){
                echo "<option value = '" . $row['studentID'] . "'> ". $row['studentID'] . "</option>";
            }
            ?>
        </select>
    </form>
        
            <form id = "years"></form>
            <form id = "types"></form>
            <form id = "keyword"></form>
        </br>
        <table id="examHistory" class="table filterable order-table table-hover table-bordered table-striped"></table>

<!--
    <form id = "section"></form>
    <form id = "semesterYear"></form>
    <form id = "studentID"></form>
    <div id = "studentGrades"></div>
-->
  </center>
    
    
    
    

              <br/>

    </tbody>

    </table>


  </div><!-- /container -->



</body>
</html>
