<?php
include 'dbConnect.php';
$studentID = $_GET['sid'];

$query = "SELECT DISTINCT semYear FROM COURSESECTION";

$result = mysqli_query($connection, $query);

echo '<select name="year" onchange ="showTypes(this.value)">';
echo    '<option value="">Select a Year:</option>';
while ($row = mysqli_fetch_array($result)){
    echo "<option value = '" . $row['semYear'] . "'> ". $row['semYear'] . "</option>";
}

echo '</select>';



// echo "The student average for Question ". $questionPlusValue[0] . " = " . (($studentSum/$questionPlusValue[1])*100);
// echo "<br>";
// echo "ExamID: ".$examID." <br> Sum of Student Answers: ".$studentSum ." <br> QuestionNumber: ".$questionPlusValue[0]." <br> Value of Question: ". $questionPlusValue[1];
mysqli_close($connection);
?>