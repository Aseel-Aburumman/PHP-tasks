<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pokédex</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f5f5f5;
      color: #333;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      display: flex;
      flex-direction: column;
      background-color: #ffffff;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 90%;
      max-width: 600px;
      padding: 20px;
      text-align: center;
    }

    form {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    input[type="text"] {
      width: 70%;
      padding: 10px;
      border: 2px solid #ff69b4;
      border-radius: 20px;
      outline: none;
    }

    button {
      padding: 10px 20px;
      background-color: #ff69b4;
      border: none;
      color: #fff;
      border-radius: 20px;
      cursor: pointer;
      margin-left: 10px;
    }

    button:hover {
      background-color: #ff1493;
    }

    #pokemon-container {
      text-align: left;
    }

    #pokemon-container img {
      width: 100%;
      height: auto;
      border-radius: 10px;
    }

    #pokemon-container h3 {
      color: #ff69b4;
      font-size: 18px;
      margin: 10px 0 5px;
    }

    #pokemon-container p {
      font-size: 14px;
      color: #555;
    }
  </style>
</head>

<body>
  <div class="container">
    <form id="search-form" method="post" style="padding-top: 10%">
      <input type="text" name="poke-search" placeholder="Enter Pokémon name or ID" />
      <button type="submit">Search</button>
    </form>
    <div id="pokemon-container">
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $query = strtolower($_POST['poke-search']);
        $url = "https://pokeapi.co/api/v2/pokemon/$query";
        $response = file_get_contents($url);
        if ($response) {
          $data = json_decode($response, true);
          echo "<div>";
          echo "<img src='" . $data['sprites']['front_default'] . "'>";
          echo "<h3>" . ucfirst($data['name']) . "</h3>";
          echo "<p>Type: " . implode(', ', array_map('ucfirst', array_column(array_column($data['types'], 'type'), 'name'))) . "</p>";
          echo "<p>Height: " . ($data['height'] / 10) . " m</p>";
          echo "</div>";
        } else {
          echo "<p>Error fetching Pokémon info</p>";
        }
      }
      ?>
    </div>
  </div>
</body>

</html>