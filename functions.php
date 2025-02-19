<?php
function addStudent($pdo, $studentFN, $studentLN, $studentEmail, $studentDOB, $studentGender, $studentMajor, $studentEnrollment)
{
    try {
        $sql = "INSERT INTO students (first_name, last_name, email, date_of_birth, gender, major, enrollment_year) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$studentFN, $studentLN, $studentEmail, $studentDOB, $studentGender, $studentMajor, $studentEnrollment]);

        return "Student added successfully!";
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

function addCourse($pdo, $course_name, $course_code, $credits, $department)
{
    try {
        $sql = "INSERT INTO courses (course_name,course_code,credits,department)
        VALUES(?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$course_name, $course_code, $credits, $department]);
        return "Course added successfully!";
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}
function addInstructor($pdo, $instructorFN, $instructorLN, $instructorEmail, $instructorHireDate, $instructorDepartment)
{
    try {
        $sql = "INSERT INTO instructors (first_name, last_name, email, hire_date, department) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$instructorFN, $instructorLN, $instructorEmail, $instructorHireDate, $instructorDepartment]);

        return "Instructor added successfully!";
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}
