<?php
include 'dbConnect.php';
$username = $_GET['fid'];
$courseID = $_GET['c'];
$sectionNumber = $_GET['s'];
$query = "SELECT semester,semYear from COURSESECTION WHERE facultyID = '" . $username . "' ".
         "AND courseID = '" . $courseID . "' " . "AND sectionNumber = " . $sectionNumber;
$result = mysqli_query($connection, $query);
echo '<select name="semesterYear" onchange="showRoster(this.value)">';
//echo '<select name="semesterYear">';
echo '<option value="">Semester - Year:</option>';
while ($row = mysqli_fetch_array($result)){
    echo "<option value = '" . $row['semester'] . " " . $row['semYear'] . "'> ". $row['semester'] . " " . $row['semYear'] . "</option>";
}
mysqli_close($connection);
?>