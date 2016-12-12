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
            <li class="active"><a href="student-roster.php">Exam Question Average<span class="sr-only">(current)</span></a></li>
            <?php echo '<li><a href="student-exam-history.php?username=' . $_GET[username] . '">Student Exam History</a></li>' ?>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <h3><center><strong>Exam Question Average</strong></center></h3>
  <h5><center><strong>Use the dropdown below to calculate exam question average.</strong></center></h5>

    <script>
        function showSections(course) {
            if (course == "") {
                document.getElementById("section").style.display = "hidden";
                document.getElementById("section").innerHTML = "";
                return;
            }

            else {
                sessionStorage.course = course;
                document.getElementById("section").style.display = "visible";
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
                        document.getElementById("section").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","getSection.php?c="+course+"&fid="+sessionStorage.username,true);
                xmlhttp.send();
            }
        }

        function showSemesterYear(section) {
            if (section == "") {
                document.getElementById("semesterYear").style.display = "hidden";
                document.getElementById("semesterYear").innerHTML = "";
                return;
            }

            else {
                sessionStorage.section = section;
                document.getElementById("semesterYear").style.display = "visible";
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
                        document.getElementById("semesterYear").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","getSemesterYear_forExams.php?c="+sessionStorage.course+"&s="+ sessionStorage.section+"&fid="+sessionStorage.username,true);
                xmlhttp.send();
            }
        }


        function showExams(semesterYear) {
            if (semesterYear == "") {
                document.getElementById("exams").style.display = "hidden";
                document.getElementById("exams").innerHTML = "";
                return;
            }

            else {
                sessionStorage.semesterYear = semesterYear;
                document.getElementById("exams").style.display = "visible";
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
                        document.getElementById("exams").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","getExams.php?c="+sessionStorage.course+"&s="+ sessionStorage.section+"&fid="+sessionStorage.username+"&semYear="+sessionStorage.semesterYear,true);
                xmlhttp.send();
            }
        }


        function showQuestions(examID) {
            if (examID == "") {
                document.getElementById("questions").style.display = "hidden";
                document.getElementById("questions").innerHTML = "";
                return;
            }

            else {
                sessionStorage.examID = examID;
                document.getElementById("questions").style.display = "visible";
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
                        document.getElementById("questions").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","getExamQuestions.php?c="+sessionStorage.course+"&s="+ sessionStorage.section+"&fid="+sessionStorage.username+"&semYear="+sessionStorage.semesterYear+"&examID="+examID,true);
                xmlhttp.send();
            }
        }


        function showAverage(questionPlusValue) {
            if (questionPlusValue == "") {
                document.getElementById("average").style.display = "hidden";
                document.getElementById("average").innerHTML = "";
                return;
            }

            else {
                sessionStorage.questionPlusValue = questionPlusValue;
                document.getElementById("average").style.display = "visible";
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
                        document.getElementById("average").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","getQuestionAverage.php?c="+sessionStorage.course+"&s="+ sessionStorage.section+"&fid="+sessionStorage.username+"&semYear="+sessionStorage.semesterYear+"&examID="+sessionStorage.examID+"&questionPlusValue="+questionPlusValue,true);
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


    $username = $_GET['username'];

         if(isset($username)){
              echo '<script type="text/javascript">'.
                  'sessionStorage.username = "'. $username .'";'.
                  '</script>';
          }
    $query = "SELECT DISTINCT courseID FROM COURSESECTION WHERE facultyID = '". $username ."'";
    //Beginning of the dropdown menu


    ?>
<center>
       <form>
<!--        <select name="users">-->
        <select name="users" onchange="showSections(this.value)">
            <option value="">Select a Course:</option>
            <?php
            echo $query;
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_array($result)){
                echo "<option value = '" . $row['courseID'] . "'> ". $row['courseID'] . "</option>";
            }
            ?>
        </select>
    </form>

    <form id = "section"></form>
    <form id = "semesterYear"></form>
    <form id = "exams"></form>
    <form id = "questions"></form>
    <div id = "average"></div>
</center>

              <br/>

    </tbody>

    </table>


  </div><!-- /container -->


</body>
</html>
