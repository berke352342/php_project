<?php
ob_start();
session_start();
require_once "classes/Database.php";


if($_SERVER['REQUEST_METHOD'] === 'POST') {

     $name = $_POST['name'];
     $email = $_POST['email'];
     $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

     $db = new Database();
     $stmt = $db->conn->prepare("INSERT INTO admins (name, email, password) VALUES (?, ?, ?)");

try {
     $stmt->execute([$name, $email, $password]);
      header("Location: login.php?registered=1");
      exit;
 }catch (PDOException $e) {
     
        if($e->getCode() == 23000) {
             $stmt = $db->conn->prepare("UPDATE admins SET name=?, password=? WHERE email=?");
             $stmt->execute([$name, $password, $email]);
             header("Location: login.php?registered=1");
             exit;
         } else {
             $error = "Registration has failed!";
     }
      }
}

include "templates/header.php";
?>

<main>
<h1>Register Admin</h1>
<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
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

<?php include "templates/footer.php"; ob_end_flush(); ?>
