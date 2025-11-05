<?php
include "templates/header.php";
require_once "classes/Database.php";


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $db = new Database();
    $stmt = $db->conn->prepare("INSERT INTO admins (name, email, password) VALUES (?, ?, ?)"); // it will insert new admin to database
    $stmt->execute([$name, $email, $password]);
    echo "<p> Admin is registered successfully! </p>";
}
?>

<main>

    <h1>Register Admin</h1>
      <form method="post">
         <label>Name:</label><br>
         <input type="text" name="name" required><br>
         
         <label>Email:</label><br>
         <input type="email" name="email" required><br>

         <label>Password:</label><br>
         <input type="password" name="password" required><br>

         <button type="submit">Register</button>
    </form>

</main>

<?php include "templates/footer.php"; ?>