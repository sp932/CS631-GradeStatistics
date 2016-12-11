<?php
include 'dbConnect.php';
$username = $_GET['fid'];
$courseID = $_GET['c'];
$sectionNumber = $_GET['s'];
$semesterYear = explode(" ", $_GET['semYear']);

$query = "SELECT examType, examID ".
         "FROM EXAMS ".
         "WHERE facultyID = '" . $username . "' ".
         "AND courseID = '" . $courseID . "' " . 
         "AND sectionNumber = " . $sectionNumber . " ".
         "AND semester = '" . $semesterYear[0] . "' ".
         "AND semYear = " . $semesterYear[1];
    
$result = mysqli_query($connection, $query);
//echo '<select name="semesterYear" onchange="showSemesterYear(this.value)">';


echo '<select name="examType" onchange="showQuestions(this.value)">';
//echo '<select name="examType">';
echo '<option value="">Exam:</option>';
while ($row = mysqli_fetch_array($result)){
    echo "<option value = '" . $row['examID'] ."'> ". $row['examType'] . "</option>";
} 
mysqli_close($connection);
?>