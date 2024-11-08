<header>
  <div class="container">
    <div class="logo">
      <h1>ShoeShop</h1>
    </div>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <?php if (isset($_SESSION['user_id'])) { ?>
          <li><a href="logout.php">Logout</a></li>
        <?php } else { ?>
          <li><a href="login.php">Login</a></li>
          <li><a href="register.php">Register</a></li>
        <?php } ?>
      </ul>
    </nav>
  </div>
</header>