<?php
include 'dbConnect.php';
$username = $_GET['fid'];
$courseID = $_GET['c'];
$sectionNumber = $_GET['s'];
$semesterYear = explode(" ", $_GET['semYear']);
$studentID = $_GET['studentID'];

$query = "SELECT s.studentID, SUM(s.grade) as grade_sum, SUM(eq.value) as value_sum, CONCAT(SUM(s.grade)/SUM(eq.value)*100,'%') as student_grade FROM STUDENTEXAMQUESTIONS s INNER JOIN EXAMS e on s.examID = e.examID ".
 "INNER JOIN EXAMQUEST eq on e.examID = eq.examID and s.questionID = eq.questionID and s.studentID ='" . $studentID .
 "' and e.courseID ='" . $c .
 "' and e.sectionNumber ='" . $s .
 "' and e.facultyID ='" . $fid ;

$result = mysqli_query($connection, $query);
$studentSum = 0;
while ($row = mysqli_fetch_array($result)){
    echo "<br>";
    echo $row['grade'];
}

echo"     ".$query."     ";

echo $row['grade_sum'];
echo $row['value_sum'];
echo $row['student_grade'];

// echo "The student average for Question ". $questionPlusValue[0] . " = " . (($studentSum/$questionPlusValue[1])*100);
// echo "<br>";
// echo "ExamID: ".$examID." <br> Sum of Student Answers: ".$studentSum ." <br> QuestionNumber: ".$questionPlusValue[0]." <br> Value of Question: ". $questionPlusValue[1];
// mysqli_close($connection);
?>
