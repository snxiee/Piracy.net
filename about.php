<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Snx's Private TSE - About</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom styles for the About page */
    body {
      background-color: #131c2b;
      font-family: Arial, sans-serif;
      color: #fff;
      min-height: 100vh;
      position: relative;
    }

    .navbar {
      background-color: #0e1624;
      padding: 0px;
      box-shadow: 1px 5px 10px rgba(0, 0, 0, 0.7);
    }

    .navbar-brand {
      font-size: 24px;
      color: #fff;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    .navbar-nav .nav-link {
      color: #fff;
      font-size: 18px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .container {
      padding: 20px;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    h1 {
      color: #fff;
      margin-bottom: 20px;
    }

    p {
      margin-bottom: 20px;
    }

    .footer {
      background-color: #0e1624;
      box-shadow: 1px -5px 10px rgba(0, 0, 0, 0.7);
      color: #999;
      padding: 20px;
      position: absolute;
      bottom: 0;
      width: 100%;
    }

    .footer .text-muted {
      color: #999;
    }

  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-md">
    <div class="container">
      <a class="navbar-brand" href="#">Snx's Private TSE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="./trending.php">Trending</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Donation</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container">
    <h1>About Snx's Private TSE</h1>
    <p>This is a private torrent search engine that allows you to search for and find the latest trending torrents. The trending torrents are fetched from 1337x.to.</p>
    <p>You can use the navigation bar above to access different sections of the website.</p>
  </div>

  <!-- Footer -->
  <footer class="footer text-center">
    <p class="text-muted">© 2023 Snx's Private TSE. All rights reserved.</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
