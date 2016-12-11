<?php
include 'dbConnect.php';
$username = $_GET['fid'];
$courseID = $_GET['c'];
$sectionNumber = $_GET['s'];
$semesterYear = explode(" ", $_GET['semYear']);

$query = "SELECT s.SSN,s.studentID, s.name, s.email, s.major, s.DOB, s.city, s.state, s.zip, s.street ".
         "FROM STUDENTS s, STUDENTREG sr ".
         "WHERE sr.facultyID = '" . $username . "' ".
         "AND sr.courseID = '" . $courseID . "' " . 
         "AND sr.sectionNumber = " . $sectionNumber . " ".
         "AND sr.semester = '" . $semesterYear[0] . "' ".
         "AND sr.semYear = " . $semesterYear[1] . " ".
         "AND s.studentID = sr.studentID";
    
$result = mysqli_query($connection, $query);
//echo '<select name="semesterYear" onchange="showSemesterYear(this.value)">';


echo '<thead>';
echo    '<tr>';
echo      '<th align="center">SSN</th>';
echo      '<th align="center">Student ID</th>';
echo      '<th align="center">Name</th>';
echo      '<th align="center">Major</th>';
echo      '<th align="center">Email</th>';
echo      '<th align="center">DOB</th>';
echo      '<th align="center">City</th>';
echo      '<th align="center">State</th>';
echo      '<th align="center">Zip</th>';
echo      '<th align="center">Street</th>';
echo    '</tr>';
echo '</thead>';

while ($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>";
    echo $row['SSN'];
    echo "</td>";
    echo "<td>";
    echo $row['studentID'];
    echo "</td>";
    echo "<td>";
    echo $row['name'];
    echo "</td>";
    echo "<td>";
    echo $row['email'];
    echo "</td>";
    echo "<td>";
    echo $row['major'];
    echo "</td>";
    echo "<td>";
    echo $row['DOB'];
    echo "</td>";
    echo "<td>";
    echo $row['state'];
    echo "</td>";
    echo "<td>";
    echo $row['city'];
    echo "</td>";
    echo "<td>";
    echo $row['zip'];
    echo "</td>";
    echo "<td>";
    echo $row['street'];
    echo "</td>";
    echo "</tr>";
}
mysqli_close($connection);
?>