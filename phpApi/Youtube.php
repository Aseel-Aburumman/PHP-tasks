<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>YouTube Video Search</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #fbeff3;
      color: #333;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background-color: #ffffff;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 90%;
      /* max-width: 600px; */
      text-align: center;
    }

    h1 {
      color: #d6336c;
      margin-bottom: 20px;
    }

    form {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    input[type="text"] {
      width: 70%;
      padding: 10px;
      border: 2px solid #d6336c;
      border-radius: 20px;
      outline: none;
    }

    button {
      padding: 10px 20px;
      background-color: #d6336c;
      border: none;
      color: #fff;
      border-radius: 20px;
      cursor: pointer;
      margin-left: 10px;
    }

    button:hover {
      background-color: #c02458;
    }

    .video {
      margin-bottom: 20px;
      text-align: left;
      margin-left: 10px;
    }

    .video img {
      width: 100%;
      height: auto;
      border-radius: 10px;
    }

    .video h3 {
      color: #d6336c;
      font-size: 18px;
      margin: 10px 0 5px;
    }

    .video p {
      font-size: 14px;
      color: #555;
    }

    #video-container {
      display: flex;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>YouTube Video Search</h1>
    <form id="search-form" method="post">
      <input type="text" name="search-input" placeholder="Enter search term" />
      <button type="submit" id="search-button">Search</button>
    </form>
    <div id="video-container">
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // URL encoding converts characters into a format that can be transmitted over the Internet.
        $query = urlencode($_POST['search-input']);
        $apiKey = "AIzaSyDdX0wF23lAzBPq6H2-UlwRo2YIud1hFJg";
        $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=$query&key=$apiKey";

        $response = file_get_contents($url);
        if ($response) {
          $data = json_decode($response, true);
          $videos = $data['items'];

          foreach ($videos as $video) {
            echo "<div class='video'>";
            echo "<img src='" . $video['snippet']['thumbnails']['medium']['url'] . "' alt='" . htmlspecialchars($video['snippet']['title']) . "'>";
            echo "<h3>" . htmlspecialchars($video['snippet']['title']) . "</h3>";
            echo "<p>" . htmlspecialchars($video['snippet']['description']) . "</p>";
            echo "</div>";
          }
        } else {
          echo "<p>Error fetching videos</p>";
        }
      }
      ?>
    </div>
  </div>
</body>

</html>