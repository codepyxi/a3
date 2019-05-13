<?php

// Sources:
// https://www.php.net/manual/en/array.sorting.php
// Ampersand $students_sorted_by_ID so the function fcn_sort_by_id
// will modify directly $students_sorted_by_ID.

// https://www.php.net/manual/en/function.array-multisort.php
// https://stackoverflow.com/questions/96759/how-do-i-sort-a-multidimensional-array-in-php


$students = array(
    "1234567" => array("FName" => "Brendan", "LName" => "Wood", "GPA" => 3.4),
    "2345678" => array("FName" => "Nathalie", "LName" => "Smith", "GPA" => 3.34),
    "3456789" => array("FName" => "John", "LName" => "Doe", "GPA" => 2.7),
    "4567890" => array("FName" => "Sammy", "LName" => "Singh", "GPA" => 3.7),
    "5678901" => array("FName" => "Sarah", "LName" => "Dubois", "GPA" => 3.5),
    "6789012" => array("FName" => "Emma", "LName" => "Smith", "GPA" => 4.0),
);

//print_r ($students);


$students_sorted_by_ID = $students;
$students_sorted_by_GPA = $students;


// fcn_sort_by_id($a, $b) --> Function that sorts a student array.
// Sorting is ascending. (smallest on top, largest bottom)
function fcn_sort_by_id ($data)
{
  $tempIDArray = [];
  // Iterate and gather all IDs into a new array called $tempIDArray
  foreach ($data as $key => $value) {
    $tempIDArray[] = $key;
  }

  asort($tempIDArray);

  $result = [];

  // Map back
  foreach ($tempIDArray as $index => $name) {
    $result[$name] = $data[$name];
  }

  $data = $result;

  print_r($data);
}

// fcn_sort_by_id($students_sorted_by_ID);

// fcn_sort_by_gpa($a, $b) --> Function sorts a student array by GPA
function fcn_sort_by_gpa($data)
{
  $tempGPAAarray = [];

  foreach ($data as $key => $row) {
    // Iterate and gather the GPA
    $tempGPAAarray[$key] = $row["GPA"];
  }

  print_r($tempGPAAarray);

  array_multisort($tempGPAAarray, SORT_ASC, $data);

  print_r($data);
}

fcn_sort_by_gpa($students_sorted_by_GPA);


?>
