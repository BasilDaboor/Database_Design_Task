<?php
include '../config.php';
include '../functions.php';

$sql = "SELECT * FROM courses";
$stmt = $pdo->query($sql);
$courses = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>courses</title>
    <link rel="stylesheet" href="../students/style.css">
</head>

<body>

    <h1>Courses</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Course Code</th>
            <th>Credits</th>
            <th>Department</th>
        </tr>
        <?php foreach ($courses as $course) : ?>
            <tr>
                <td><?php echo $course['course_id']; ?></td>
                <td><?php echo $course['course_name']; ?></td>
                <td><?php echo $course['course_code']; ?></td>
                <td><?php echo $course['credits']; ?></td>
                <td><?php echo $course['department']; ?></td>

            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>