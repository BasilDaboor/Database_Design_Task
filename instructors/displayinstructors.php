<?php
include '../config.php';
include '../functions.php';

$sql = "SELECT * FROM instructors";
$stmt = $pdo->query($sql);
$instructors = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../students/style.css">
</head>

<body>
    <h1>Instructors</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Hire Date</th>
            <th>Department</th>
        </tr>
        <?php foreach ($instructors as $instructor) : ?>
            <tr>
                <td><?php echo $instructor['instructor_id']; ?></td>
                <td><?php echo $instructor['first_name']; ?></td>
                <td><?php echo $instructor['last_name']; ?></td>
                <td><?php echo $instructor['email']; ?></td>
                <td><?php echo $instructor['hire_date']; ?></td>
                <td><?php echo $instructor['department']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>


</body>

</html>