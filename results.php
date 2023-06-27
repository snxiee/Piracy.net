<?php
// Include the Simple HTML DOM Parser library
require 'simple_html_dom.php';

// Check if the query parameter is present in the URL
if (isset($_GET['query'])) {
  // Get the search query from the URL
  $searchQuery = $_GET['query'];

  // Function to scrape torrents from 1337x
  function scrapeTorrents($query) {
    $url = 'https://1337x.to/search/' . urlencode($query) . '/1/';
    $html = file_get_contents($url);

    // Create a DOM object and load the HTML content
    $dom = new simple_html_dom();
    $dom->load($html);

    // Find the torrent results
    $results = $dom->find('.table-list tbody tr');

    // Create an empty array to store the formatted results
    $formattedResults = [];

    // Iterate over each result and extract the necessary information
    foreach ($results as $result) {
      $titleElement = $result->find('.coll-1 a', 1);
      $title = $titleElement ? $titleElement->plaintext : '';        
      $sizeElement = $result->find('.coll-4', 0);
      $seedsElement = $result->find('.coll-2', 0);
      $leechesElement = $result->find('.coll-3', 0);
      $uploaderElement = $result->find('.coll-5', 0);

      $title = $titleElement ? $titleElement->plaintext : '';
      $size = $sizeElement ? $sizeElement->plaintext : '';
      $seeds = $seedsElement ? $seedsElement->plaintext : '';
      $leeches = $leechesElement ? $leechesElement->plaintext : '';
      $uploader = $uploaderElement ? $uploaderElement->plaintext : '';

      // Find the magnet link
      $magnetElement = $result->find('.coll-1 a', 1);
      $magnetLink = $magnetElement ? $magnetElement->href : '';

      // Extract the URL of the search result page
      $torrentUrl = $titleElement ? $titleElement->href : '';

      // Format the result and add it to the formatted results array
      $formattedResult = [
        'title' => $title,
        'size' => $size,
        'seeds' => $seeds,
        'leeches' => $leeches,
        'uploader' => $uploader,
        'magnet' => $magnetLink,
        'url' => $torrentUrl,
      ];
      $formattedResults[] = $formattedResult;
    }

    return $formattedResults;
  }

  // Scrape the torrents
  $searchResults = scrapeTorrents($searchQuery);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Piracy.net - Results</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom styles for the search results page */
    body {
      background-color: #131c2b;
      font-family: Arial, sans-serif;
      color: #fff;
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

    .query {
      margin-top: 50px;
      text-align: center;
      margin-bottom: 25px;
    }

    h1 {
      color: #fff;
      margin-bottom: 20px;
    }

    .torrent-table {
      color: #fff;
      background-color: #0e1624;
      border: none;
      margin-top: 30px;
    }

    .torrent-table th {
      background-color: #1a263b;
      color: #fff;
      border: none;
      border-bottom: 1px solid #25395c;
    }

    .torrent-table td {
      border-top: 1px solid #25395c;
      border-bottom: 1px solid #25395c;
    }

    .torrent-table td.publisher-column {
      width: 20%;
    }

    .magnet-link {
      color: #187bcd;
      text-decoration: none;
    }

.footer {
  background-color: #0e1624;
  box-shadow: 1px -5px 10px rgba(0, 0, 0, 0.7);
  color: #999;
  padding: 20px;
  position: relative; /* Add this line */
  z-index: 2; /* Increase the z-index value */
}


    .footer .text-muted {
      color: #999;
    }

    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-track {
      background-color: rgba(0, 0, 0, 0.7);
    }

    ::-webkit-scrollbar-thumb {
      background-color: #25395c;
      border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background-color: #5782d4;
    }

    /* Animation styles */
    .torrent-table td.uploader-0xEMPRESS {
      position: relative;
      color: #fff;
      -webkit-animation: glow 1s ease-in-out infinite alternate;
      -moz-animation: glow 1s ease-in-out infinite alternate;
      animation: glow 1s ease-in-out infinite alternate;
      z-index: 1;
    }

/*    .torrent-table td.uploader-0xEMPRESS::before {
  content: "\f00c";
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  font-size: 18px;
  color: #5782d4;
  position: absolute;
  top: 32.5%; 
  right: 20px; 
  transform: translateY(-50%);
  animation: none; 
  z-index: 1;
} */

.torrent-table td.uploader-0xEMPRESS::after {
  content: '';
  position: absolute;
  top: 15%;
  left: -20%;
  left: 0;
  width: 120px; 
  height: 30px; 
  background: url("images/bg4_zps012f7fcf.gif") repeat-x;
  z-index: -1;
  opacity: 0.2;
  animation: slide 3s linear infinite;
}

.torrent-table td.uploader-DODI {
  position: relative;
      color: #fff;
      -webkit-animation: glow 1s ease-in-out infinite alternate;
      -moz-animation: glow 1s ease-in-out infinite alternate;
      animation: glow 1s ease-in-out infinite alternate;
      z-index: 1;
}

/*.torrent-table td.uploader-DODI::before {
  content: "\f00c";
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  font-size: 18px;
  color: #5782d4;
  position: absolute;
  top: 32.5%; 
  right: 75px; 
  transform: translateY(-50%);
  animation: none;
  z-index: 1;
} */

.torrent-table td.uploader-DODI::after {
  content: '';
  position: absolute;
  top: 15%;
  left: 3%;
  width: 50px; /* Adjust the width as needed */
  height: 30px; /* Adjust the height as needed */
  background: url("images/bg4_zps012f7fcf.gif") repeat-x;
  z-index: -1;
  opacity: 0.2;
  animation: slide 3s linear infinite;
}

    @keyframes slide {
      from {
        background-position: 0 0;
      }
      to {
        background-position: 100% 0;
      }
    }

    @-webkit-keyframes glow {
      from {
        text-shadow: 0 0 10px #5782d4, 0 0 20px #5782d4, 0 0 30px #5782d4;
      }
      to {
        text-shadow: 0 0 20px #5782d4, 0 0 30px #5782d4, 0 0 40px #5782d4;
      }
    }

    @-moz-keyframes glow {
      from {
        text-shadow: 0 0 10px #5782d4, 0 0 20px #5782d4, 0 0 30px #5782d4;
      }
      to {
        text-shadow: 0 0 20px #5782d4, 0 0 30px #5782d4, 0 0 40px #5782d4;
      }
    }

    @keyframes glow {
      from {
        text-shadow: 0 0 10px #5782d4, 0 0 20px #5782d4, 0 0 30px #5782d4;
      }
      to {
        text-shadow: 0 0 20px #5782d4, 0 0 30px #5782d4, 0 0 40px #5782d4;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
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

  <!-- Main Content -->
  <div class="container">
    <h1 class="query">Search Results for "<?php echo $searchQuery; ?>"</h1>

    <!-- Torrent Table -->
    <table class="table table-striped torrent-table">
  <thead>
    <tr>
      <th>Title</th>
      <th>Size</th>
      <th>Seeds</th>
      <th>Leeches</th>
      <th>Uploader</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($searchResults)) : ?>
      <?php foreach ($searchResults as $result) : ?>
        <tr>
          <td><?php echo $result['title']; ?></td>
          <td><?php echo $result['size']; ?></td>
          <td><?php echo $result['seeds']; ?></td>
          <td><?php echo $result['leeches']; ?></td>
          <td class="<?php echo $result['uploader'] === '0xEMPRESS' ? 'uploader-0xEMPRESS' : ($result['uploader'] === 'DODI' ? 'uploader-DODI' : ''); ?>"><span><?php echo $result['uploader']; ?></span></td>
          <td><a class="magnet-link" href="<?php echo $result['magnet']; ?>">Magnet</a></td>
        </tr>
      <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <td colspan="6">No results found.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

  <!-- Footer -->
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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
