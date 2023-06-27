<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Piracy.net - Home</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom styles for the homepage */
    body {
      background-color: #131c2b;
      font-family: Arial, sans-serif;
      color: #fff;
      margin: 0;
    }

    .navbar {
      background-color: #0e1624;
      box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.7);
    }

    .navbar-brand {
      font-size: 24px;
      font-weight: bold;
      color: #fff;
    }

    .navbar-nav .nav-item .nav-link {
      color: #fff;
      font-weight: bold;
      font-size: 16px;
      transition: color 0.3s;
    }

    .navbar-nav .nav-item .nav-link:hover,
    .navbar-nav .nav-item .nav-link:focus {
      color: #5782d4;
    }

    .hero-section {
      background-image: url('LINK FOR BACKGROUND THAT WONT BE USED IN THIS THEME...');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      min-height: 85vh;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .hero-content {
      max-width: 600px;
      margin: 0 auto;
    }

    h1 {
      font-size: 48px;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 2px;
      margin-bottom: 20px;
      color: #fff;
    }

    .subheading {
      font-size: 24px;
      margin-bottom: 20px;
      color: #fff;
    }

    .advertisements {
      display: flex;
      justify-content: space-between;
      margin-top: 40px;
    }

    .advertisement {
      width: 30%;
      height: 200px;
      background-color: #25395c;
      padding: 20px;
      border-radius: 5px;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .advertisement img {
      max-width: 100%;
      max-height: 100%;
    }

    .footer {
      background-color: #0e1624;
      box-shadow: 1px -5px 10px rgba(0, 0, 0, 0.7);
      color: #999;
      padding: 20px;
    }

    .footer .text-muted {
      color: #999;
    }

    .search-form {
      margin-top: 20px;
    }

    .search-input {
      background-color: #2c3e64;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 5px;
      width: 300px;
    }

    .search-button {
      background-color: #2c3e64;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      margin-left: 10px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-md">
    <div class="container">
      <a class="navbar-brand" href="#">PIRACY.NET</a>
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

  <div class="hero-section">
    <div class="hero-content">
      <h1>Piracy.net</h1>
      <p class="subheading">Your #1 Open Source Torrent Searching Engine</p>
      <form class="search-form" id="search-form" action="search.php" method="GET">
        <input type="text" class="search-input" id="search-input" placeholder="Search torrents..." required>
        <button type="submit" class="search-button">Search</button>
      </form>
    </div>
  </div>

  <!--<div class="container">
    <div class="advertisements">
      <div class="advertisement">
        <img src="https://example.com/advertisement1.jpg" alt="Advertisement 1">
      </div>
      <div class="advertisement">
        <img src="https://example.com/advertisement2.jpg" alt="Advertisement 2">
      </div>
    </div>
  </div>-->

  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p class="text-muted">Piracy.net &copy; 2023. All rights reserved.</p>
        </div>
        <div class="col-md-6">
          <p class="text-muted text-right">Terms of Service | Privacy Policy</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      // Handle search form submission
      $('#search-form').on('submit', function(e) {
        e.preventDefault();
        var query = $('#search-input').val();

        // Make AJAX request to the search.php file
        $.ajax({
          url: $(this).attr('action'),
          method: $(this).attr('method'),
          data: { query: query },
          dataType: 'html',
          success: function(response) {
            // Redirect to the search results page
            window.location.href = 'results.php?query=' + query;
          },
          error: function() {
            $('#search-results').html('<p>Error occurred while fetching the search results.</p>');
          }
        });
      });
    });
  </script>
</body>

</html>