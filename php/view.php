
<?php
//php -S localhost:8000 starts server ar root folder cd C:\Users\babra\OneDrive\Desktop\CSN-Proctor-main\CSN-Proctor-main
//http://localhost:8000/StudentRegister.html
// http://localhost:8000/php/view.php
//extension=pdo_sqlite
//extension=sqlite3
// Connect to database
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbPath = __DIR__ . '/../Data/data.sqlite';

try {
    $db = new PDO('sqlite:' . __DIR__ . '/../Data/data.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->query("SELECT id, first_name, last_name, email, student_id FROM students ORDER BY id DESC");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$rows) {
        echo "<h2>No students registered yet.</h2>";
        exit;
    }

    echo "<h2>Registered Students</h2>";
    echo "<table border='1' cellpadding='6' cellspacing='0'>";
    echo "<tr><th>ID</th><th>First</th><th>Last</th><th>Email</th><th>Student ID</th></tr>";

    foreach ($rows as $r) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($r['id']) . "</td>";
        echo "<td>" . htmlspecialchars($r['first_name']) . "</td>";
        echo "<td>" . htmlspecialchars($r['last_name']) . "</td>";
        echo "<td>" . htmlspecialchars($r['email']) . "</td>";
        echo "<td>" . htmlspecialchars($r['student_id']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Database error: " . htmlspecialchars($e->getMessage());
}
