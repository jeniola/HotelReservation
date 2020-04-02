<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#1E88E5">
      <div class="container">
        <a class="navbar-brand express" href="index.php">Express Hotel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
            
            <?php 
              if (isset($_SESSION['userFirstname'])) { ?>
                <li class="nav-item ">
                  <a class="nav-link" href="admin">Admin</a>
                </li>

              <?php } else{ ?>
                <li class="nav-item ">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
              <?php }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  