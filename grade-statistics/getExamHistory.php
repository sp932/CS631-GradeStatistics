<?php
include 'dbConnect.php';
$studentID = $_GET['sid'];
$year = $_GET['year'];
$type = $_GET['type'];
$keyword = $_GET['keyword'];

if($keyword == "ALL"){
    $keyword = "%";
}

$query = "SELECT DISTINCT(EXAMS.examID) as examID, EXAMS.semester as semester, EXAMS.date as date, COURSES.courseID as courseID, COURSES.name as coursename FROM EXAMS, COURSES, STUDENTEXAMQUESTIONS WHERE EXAMS.courseID = COURSES.courseID AND STUDENTEXAMQUESTIONS.examID = EXAMS.examID ".
    "AND STUDENTEXAMQUESTIONS.studentID = '" . $studentID . "' ".
    "AND EXAMS.semYear = " . $year ." ".
    "AND EXAMS.examType = '" . $type ."' ".
    "AND COURSES.name LIKE '%" .$keyword . "%'";

$result = mysqli_query($connection, $query);

echo '<thead>';
echo    '<tr>';
echo      '<th align="center">Course ID    </th>';
echo      '<th align="center">Course Name    </th>';
echo      '<th align="center">ExamID    </th>';
echo      '<th align="center">Semester    </th>';
echo      '<th align="center">Date    </th>';
echo    '</tr>';
echo '</thead>';

while ($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>";
    echo $row['courseID'];
    echo "</td>";
    echo "<td>";
    echo $row['coursename'];
    echo "</td>";
    echo "<td>";
    echo $row['examID'];
    echo "</td>";
    echo "<td>";
    echo $row['semester'];
    echo "</td>";
    echo "<td>";
    echo $row['date'];
    echo "</td>";
    echo "</tr>";
}




// echo "The student average for Question ". $questionPlusValue[0] . " = " . (($studentSum/$questionPlusValue[1])*100);
// echo "<br>";
// echo "ExamID: ".$examID." <br> Sum of Student Answers: ".$studentSum ." <br> QuestionNumber: ".$questionPlusValue[0]." <br> Value of Question: ". $questionPlusValue[1];
mysqli_close($connection);
?>