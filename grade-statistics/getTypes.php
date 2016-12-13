<?php
$studentID = $_GET['sid'];
$year = $_GET['year'];
echo '<select name="types" onchange ="showKeyword(this.value)">';
echo    '<option value="">Select an Exam Type:</option>';
echo    "<option value ='Midterm'> Midterm </option>";
echo    "<option value ='Final'> Final </option>";
echo '</select>';
?>