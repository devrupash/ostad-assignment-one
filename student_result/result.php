<?php
function calculateResult($marks) {

    $errors = array();
    
    // Validation of mark ranges.
    foreach ($marks as $subject => $mark) {
        if ($mark < 0 || $mark > 100) {
            $errors[] = "Mark range is invalid for $subject.";
        }
        if ($mark < 33 && $mark >= 0) {
            $errors[] = "Failed in $subject.";
        }
    }

    // Show error messages if any.
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        return;
    }

    // Calculation of total and average.
    $total = array_sum($marks);
    $average = $total / count($marks);

    // Grade determination.
    switch (true) {
        case $average >= 80:
            $grade = "A+";
            break;
        case $average >= 70:
            $grade = "A";
            break;
        case $average >= 60:
            $grade = "A-";
            break;
        case $average >= 50:
            $grade = "B";
            break;
        case $average >= 40:
            $grade = "C";
            break;
        case $average >= 33:
            $grade = "D";
            break;
        default:
            $grade = "F";
    }

    // Output the result.
    echo "Total Marks: $total <br>";
    echo "Average Marks: $average<br>";
    echo "Grade: $grade";
}

// Example marks for valid data.
$studentMarks = array(
    'Math' => 85,
    'English' => 78,
    'Science' => 62,
    'History' => 56,
    'Geography' => 74,
);
calculateResult($studentMarks);

// Example marks for invalid data.
$studentMarks = array(
    'Math' => 105,
    'English' => 78,
    'Science' => 62,
    'History' => 56,
    'Geography' => -55,
);

calculateResult($studentMarks);


