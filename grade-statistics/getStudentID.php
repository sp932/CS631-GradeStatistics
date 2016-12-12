<?php
include 'dbConnect.php';
$username = $_GET['fid'];
$courseID = $_GET['c'];
$sectionNumber = $_GET['s'];
$semesterYear = explode(" ", $_GET['semYear']);

$query = "SELECT studentID from STUDENTREG WHERE facultyID = '" . $username . "' ".
         "AND courseID = '" . $courseID . "' " . "AND sectionNumber = " . $sectionNumber . " " . "AND semester = '" . $semesterYear[0] . "' ". "AND semYear = " . $semesterYear[1];
echo $semesterYear[0];
echo $semesterYear[1];
echo $query;
$result = mysqli_query($connection, $query);
echo '<select name="studentID" onchange="showStudentGrades(this.value)">';
//echo '<select name="semesterYear">';
echo '<option value="">Student ID:</option>';
while ($row = mysqli_fetch_array($result)){
    echo "<option value = '" . $row['studentID'] . "'> ". $row['studentID'] . "</option>";
}
mysqli_close($connection);
?>
