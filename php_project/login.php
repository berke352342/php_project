<?php
include "templates/header.php";
require_once "classes/Database.php";

 if($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $email = $_POST['email']; 
    $password = $_POST['password'];

    $db = new Database(); 
    $stmt = $db->conn->prepare("SELECT * FROM admins WHERE email=?"); 
    $stmt->execute([$email]); // it will execute the query with provided email
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);


    if($admin && password_verify($password, $admin['password'])) { 
        $_SESSION['admin'] = $admin['name']; 
        header("Location: shop.php"); // it will go to the shop page after login
        exit;
    } else {
        $error = "Wrong email or password!"; // if you type wrong email or password it will show this message
    }
}
?>

<main>

     <h1> Admin Login </h1>
     <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?> <!-- it will show error message in red color-->

    <form method="post">
         <label>Email</label><br>
         <input type="email" name="email" required><br>

         <label>Password</label><br>
         <input type="password" name="password" required><br>
         
         <button type="submit"> Login </button>
     </form>

 </main>

<?php include "templates/footer.php"; ?>