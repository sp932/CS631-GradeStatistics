<?php
include 'dbConnect.php';
$username = $_GET['fid'];
$courseID = $_GET['c'];
$sectionNumber = $_GET['s'];
$semesterYear = explode(" ", $_GET['semYear']);
$examID = $_GET['examID'];
$questionPlusValue = explode(" ",$_GET['questionPlusValue']);

$query = "SELECT grade ".
         "FROM STUDENTEXAMQUESTIONS ".
         "WHERE examID = " . $examID ." ".
         "AND questionID = ". $questionPlusValue[0];
    
$result = mysqli_query($connection, $query);
$studentSum = 0;
while ($row = mysqli_fetch_array($result)){
    $studentSum = $studentSum + $row['grade'];
    echo "<br>";
    echo $row['grade'];
}

echo"     ".$query."     ";

echo "The student average for Question ". $questionPlusValue[0] . " = " . (($studentSum/$questionPlusValue[1])*100);
echo "<br>";
echo "ExamID: ".$examID." <br> Sum of Student Answers: ".$studentSum ." <br> QuestionNumber: ".$questionPlusValue[0]." <br> Value of Question: ". $questionPlusValue[1];
mysqli_close($connection);
?>