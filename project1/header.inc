<header>
  <ul>
    <li><img src="images/svg/logo.svg" alt="NetVision Logo" class="logo" /></li>
    <li><h4>NetVision</h4></li>
  </ul>

  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="jobs.php">Job Description</a></li>
      <li><a href="apply.php">Apply</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="manage.php">Manage</a></li>
    </ul>
    
  </nav>
  <ul>
      <li><a href="mailto:info@netvision.com.au">info@netvision.com.au</a></li>
      <?php
      if (isset($_SESSION['username'])) {
        echo '<li><h5 class="welcome-user">' . htmlspecialchars($_SESSION['displayname']) . '</h5></li>';
        echo '<li><button class="secondary"><a href="logouthandling.php">Log Out</a></button></li>';
      } else {
        echo '<li><button class="primary"><a href="login.php">Login</a></button></li>';
      }
      ?>
  </ul>

  
</header>
