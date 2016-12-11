<?php
include 'dbConnect.php';
$username = $_GET['fid'];
$courseID = $_GET['c'];
$query = "SELECT sectionNumber from COURSESECTION WHERE facultyID = '" . $username . "' ".
         "AND courseID = '" . $courseID . "' ";
$result = mysqli_query($connection, $query);
//echo '<select name="sections>';
echo '<select name="sections" onchange="showSemesterYear(this.value)">';
//echo '<select name="sections">';
echo '<option value="">Select a Section:</option>';
while ($row = mysqli_fetch_array($result)){
    echo "<option value = '" . $row['sectionNumber'] . "'> ". $row['sectionNumber'] . "</option>";
}
mysqli_close($connection);
?>