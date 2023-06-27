<?php
// Check if the search query is submitted
if (isset($_POST['query'])) {
  // Get the search query
  $searchQuery = $_POST['query'];

  // Include the Simple HTML DOM Parser library
  require 'simple_html_dom.php';

  // Function to scrape torrents from 1337x
  function scrapeTorrents($query) {
    $url = 'https://1337x.to/search/' . urlencode($query) . '/1/';
    $html = file_get_contents($url);

    // Create a DOM object and load the HTML content
    $dom = new simple_html_dom();
    $dom->load($html);

    $results = [];

    // Find the torrents
    foreach ($dom->find('.table-list tbody tr') as $torrent) {
      $title = $torrent->find('.coll-1 a', 0)->plaintext;
      $seeders = $torrent->find('.coll-2', 0)->plaintext;
      $leechers = $torrent->find('.coll-3', 0)->plaintext;

      $results[] = [
        'title' => $title,
        'seeders' => $seeders,
        'leechers' => $leechers,
      ];
    }

    // Clean up memory
    $dom->clear();

    return $results;
  }

  // Scrape the torrents
  $searchResults = scrapeTorrents($searchQuery);

  // Display the search results
  echo '<ul class="search-results">';
  foreach ($searchResults as $result) {
    echo '<li>Title: ' . $result['title'] . '</li>';
    echo '<li>Seeders: ' . $result['seeders'] . '</li>';
    echo '<li>Leechers: ' . $result['leechers'] . '</li>';
    echo '<br>';
  }
  echo '</ul>';
}
?>
