<?php
$studentID = $_GET['sid'];
$year = $_GET['year'];
$type = $_GET['type'];
echo '<input type="text" onchange="showExamHistory(this.value)" placeholder="Enter a keyword:">';
?>