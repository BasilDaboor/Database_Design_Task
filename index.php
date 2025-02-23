<?php
include "config.php";
include "functions.php";
// (id , firstname ,lastname , email , gender , major , enrollment year)

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['addStudent'])) {
    $studentFN = $_POST['studentFN'];
    $studentLN = $_POST['studentLN'];
    $studentEmail = $_POST['studentEmail'];
    $studentDOB = $_POST['studentDOB'];
    $studentGender = $_POST['studentGender'];
    $studentMajor = $_POST['studentMajor'];
    $studentEnrollment = $_POST['studentEnrollment'];
    echo addStudent($pdo, $studentFN, $studentLN, $studentEmail, $studentDOB, $studentGender, $studentMajor, $studentEnrollment);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['addCourse'])) {
    $courseName = $_POST['courseName'];
    $courseCode = $_POST['courseCode'];
    $Credits = $_POST['Credits'];
    $Department = $_POST['Department'];
    echo addCourse($pdo, $courseName, $courseCode, $Credits, $Department);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['addInstructors'])) {
    $instructorFN = $_POST['instructorFN'];
    $instructorLN = $_POST['instructorLN'];
    $instructorEmail = $_POST['instructorEmail'];
    $instructorHireDate = $_POST['instructorHireDate'];
    $instructorDepartment = $_POST['instructorDepartment'];
    echo addInstructor($pdo, $instructorFN, $instructorLN, $instructorEmail, $instructorHireDate, $instructorDepartment);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addEnrollments'])) {
    $studentId = $_POST['studentId'];
    $courseId = $_POST['courseId'];
    $grade = $_POST['grade'];
    $message = addEnrollment($pdo, $studentId, $courseId, $grade);

    // Redirect to the same page to avoid form resubmission issues
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <h1>Admin Dashboard</h1>
    </nav>

    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <ul>
                <li><a href="#students">Students</a></li>
                <li><a href="#courses">Courses</a></li>
                <li><a href="#instructors">Instructors</a></li>
                <li><a href="#enrollments">Enrollments</a></li>
                <li><a href="#assignments">Course Assignments</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="content">

            <!-- Students Form -->
            <section id="students">
                <h2>Add Student</h2>
                <form action="index.php" method="POST">
                    <input name="studentFN" type="text" placeholder="First Name" required>
                    <input name="studentLN" type="text" placeholder="Last Name" required>
                    <input name="studentEmail" type="email" placeholder="Email" required>
                    <input name="studentDOB" type="date" placeholder="Date of Birth" required>
                    <select name="studentGender" required>
                        <option value="" disabled selected>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <input name="studentMajor" type="text" placeholder="Major" required>
                    <input name="studentEnrollment" type="number" placeholder="Enrollment Year" required>
                    <div id="form-actions">
                        <button name="addStudent" type="submit">Add Student</button>
                        <a class="displayData" href="students/displayStu.php"> Show Students </a>
                    </div>
                </form>
            </section>

            <!-- Courses Form -->
            <section id="courses">
                <h2>Add Course</h2>
                <form action="index.php" method="POST">
                    <input name="courseName" type="text" placeholder="Course Name" required>
                    <input name="courseCode" type="text" placeholder="Course Code" required>
                    <input name="Credits" type="number" placeholder="Credits" required>
                    <input name="Department" type="text" placeholder="Department" required>

                    <div id="form-actions">
                        <button name="addCourse" type="submit">Add Course</button>

                        <a class="displayData" href="courses/displayCourses.php"> Show Course</a>
                    </div>

                </form>
            </section>

            <!-- Instructors Form -->
            <section id="instructors">
                <h2>Add Instructor</h2>
                <form action="index.php" method="POST">
                    <input name="instructorFN" type="text" placeholder="First Name" required>
                    <input name="instructorLN" type="text" placeholder="Last Name" required>
                    <input name="instructorEmail" type="email" placeholder="Email" required>
                    <input name="instructorHireDate" type="date" placeholder="Hire Date" required>
                    <input name="instructorDepartment" type="text" placeholder="Department" required>


                    <div id="form-actions">
                        <button name="addInstructors" type="submit">Add Instructor</button>
                        <a class="displayData" href="instructors/displayinstructors.php"> Show Instructor</a>
                    </div>
                </form>
            </section>

            <!-- Enrollments Form -->
            <section id="enrollments">
                <h2>Add Enrollment</h2>
                <form action="index.php" method="POST">
                    <select name="studentId">
                        <option value="" disabled selected>Student Name</option>
                        <?php
                        $sql = "SELECT * FROM students";
                        $stmt = $pdo->query($sql);
                        while ($row = $stmt->fetch()) {
                            echo "<option value='" . $row['student_id'] . "'>" . $row['first_name'] . " " . $row['last_name'] . "</option>";
                        }
                        ?>
                    </select>

                    <select name="courseId">
                        <option value="" disabled selected>Course Name</option>
                        <?php
                        $sql = "SELECT * FROM courses";
                        $stmt = $pdo->query($sql);
                        while ($row = $stmt->fetch()) {
                            echo "<option value='" . $row['course_id'] . "'>" . $row['course_name'] . "</option>";
                        }
                        ?>
                    </select>

                    <select name="grade" id="">
                        <option value="" disabled selected>Grade</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                    </select>
                    <button name="addEnrollments" type="submit">Add Enrollment</button>
                </form>
            </section>


            <!-- Course Assignments Form -->
            <section id="assignments">
                <h2>Add Course Assignment</h2>
                <form>
                    <input type="number" placeholder="Instructor ID" required>
                    <input type="number" placeholder="Course ID" required>
                    <input type="text" placeholder="Semester" required>
                    <input type="number" placeholder="Year" required>
                    <button type="submit">Add Assignment</button>
                </form>
            </section>

        </main>
    </div>

</body>

</html>