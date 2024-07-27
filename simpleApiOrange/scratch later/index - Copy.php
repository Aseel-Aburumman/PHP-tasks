<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Phones</title>
  <link href="https://cdn.jsdelivr.net/npm/boosted@5.3.3/dist/css/boosted.min.css" rel="stylesheet" integrity="sha384-laZ3JUZ5Ln2YqhfBvadDpNyBo7w5qmWaRnnXuRwNhJeTEFuSdGbzl4ZGHAEnTozR" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/boosted@5.3.3/dist/js/boosted.bundle.min.js" integrity="sha384-3RoJImQ+Yz4jAyP6xW29kJhqJOE3rdjuu9wkNycjCuDnGAtC/crm79mLcwj1w2o/" crossorigin="anonymous"></script>
</head>

<body onload="fetchAllPhones()">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form id="navbarSearchForm" class="form-inline ml-auto">
        <input id="navbarSearchInput" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="row" id="phoneCardsContainer">
      <!-- Phone cards will be inserted here -->
    </div>
  </div>

  <script>
    function fetchAllPhones() {
      fetch('http://localhost/tasks/simpleApiOrange/customers/get_product.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            search_term: ''
          })
        })
        .then(response => response.json())
        .then(data => {
          displayPhones(data);
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }

    document.getElementById('navbarSearchForm').addEventListener('submit', function(e) {
      e.preventDefault();

      const searchTerm = document.getElementById('navbarSearchInput').value;

      fetch('http://localhost/tasks/simpleApiOrange/get_product%20-%20Copy.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            search_term: searchTerm
          })
        })
        .then(response => response.json())
        .then(data => {
          displayPhones(data);
        })
        .catch(error => {
          console.error('Error:', error);
        });
    });

    function displayPhones(phones) {
      const container = document.getElementById('phoneCardsContainer');
      container.innerHTML = '';

      phones.forEach(phone => {
        const card = document.createElement('div');
        card.className = 'col-md-4';

        card.innerHTML = `
                    <div class="card mb-4 shadow-sm">
                        <img src="${phone.img_url}" class="card-img-top" alt="${phone.name}">
                        <div class="card-body">
                            <h5 class="card-title">${phone.name}</h5>
                            <p class="card-text">Brand: ${phone.brand}</p>
                            <p class="card-text">Price: ${phone.price}</p>
                            <p class="card-text">Old Price: ${phone.oldprice}</p>
                            <p class="card-text">Rating: ${phone.rate}</p>
                            <p class="card-text">${phone.is_out_of_stock == 1 ? 'Out of Stock' : 'In Stock'}</p>
                        </div>
                    </div>
                `;

        container.appendChild(card);
      });
    }
  </script>
</body>

</html>