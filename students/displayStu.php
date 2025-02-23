<?php
include '../config.php';
include '../functions.php';

$sql = "SELECT * FROM students";
$stmt = $pdo->query($sql);
$students = $stmt->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>students</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <h1>Students</h1>
    <table>
        <tr>
            <th id="idPlace">ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Major</th>
            <th>Enrollment year</th>
            <th>Actions</th>

        </tr>
        <?php foreach ($students as $student) : ?>
            <tr id="displayData">
                <td><?php echo $student['student_id']; ?></td>
                <td><?php echo $student['first_name']; ?></td>
                <td><?php echo $student['last_name']; ?></td>
                <td><?php echo $student['email']; ?></td>
                <td><?php echo $student['date_of_birth']; ?></td>
                <td><?php echo $student['gender']; ?></td>
                <td><?php echo $student['major']; ?></td>
                <td><?php echo $student['enrollment_year']; ?></td>
                <td class="actions">
                    <i class="fa-solid fa-trash delete" data-id="<?php echo $student['student_id']; ?>"></i>
                    <i class="fa-solid fa-pen-to-square edit"></i>
                    <!-- displayDataToBeUpdated -->
                </td>
            </tr>
            <tr id="editData" class="hidden">
                <form action="updateStudent.php" method="POST">
                    <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
                    <td><?php echo $student['student_id']; ?></td>
                    <td><input class="short" type="text" name="first_name" value="<?php echo $student['first_name']; ?>"></td>
                    <td><input class="short" type="text" name="last_name" value="<?php echo $student['last_name']; ?>"></td>
                    <td><input type="text" name="email" value="<?php echo $student['email']; ?>"></td>
                    <td><input type="text" name="date_of_birth" value="<?php echo $student['date_of_birth']; ?>"></td>
                    <td><input class="short" type="text" name="gender" value="<?php echo $student['gender']; ?>"></td>
                    <td><input class="short" type="text" name="major" value="<?php echo $student['major']; ?>"></td>
                    <td><input class="short" type="text" name="enrollment_year" value="<?php echo $student['enrollment_year']; ?>"></td>
                    <td class="actions">
                        <button type="submit" class="BTN" name="updateStudent">
                            <i class="fa-solid fa-circle-check confirm"></i>
                        </button>
                        <i class="fa-solid fa-rectangle-xmark cancel"></i>
                    </td>
                </form>
            </tr>
        <?php endforeach; ?>

        <script src="student.js"></script>
</body>

</html>