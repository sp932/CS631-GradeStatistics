<?php
include 'dbConnect.php';
$username = $_GET['fid'];
$courseID = $_GET['c'];
$sectionNumber = $_GET['s'];
$semesterYear = explode(" ", $_GET['semYear']);
$examID = $_GET['examID'];

$query = "SELECT questionID, value ".
         "FROM EXAMQUEST ".
         "WHERE examID = " . $examID; 
    
$result = mysqli_query($connection, $query);
//echo '<select name="semesterYear" onchange="showSemesterYear(this.value)">';


//echo '<select name="questions">';
echo '<select name="questions" onchange="showAverage(this.value)">';
//echo '<select name="examType">';
echo '<option value="">Question:</option>';
while ($row = mysqli_fetch_array($result)){
    echo "<option value = '" . $row['questionID'] . " " . $row['value']. "'> ". $row['questionID'] . "</option>";
} 
mysqli_close($connection);
?>