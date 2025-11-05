<?php include "templates/header.php"; ?>
<main>
     <h1>Contact Us</h1>
     <form action="" method="post">
        <label>Name</label><br>
        <input type="text" name="name" required><br>

        <label>Email</label><br>
        <input type="email" name="email" required><br>

        <label>Message</label><br>
        <textarea name="message" required></textarea><br>

        <button type="submit"> Send </button>
    </form>
</main>

<?php include "templates/footer.php"; ?>