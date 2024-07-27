<?php
$phones = [
  [
    'name' => 'Samsung Galaxy Note 20 Ultra',
    'img_url' => 'https://image-us.samsung.com/us/smartphones/galaxy-s21/gallery-images-palette-exclusive/P3-Exclusive-Phantom-Brown/PDP-P3-Phantom-Brown-lockup-01-1600x1200.jpg?$product-details-jpg$',
    'rate' => '5',
    'brand' => 'Samsung',
    'price' => 'JOD 759.00',
    'oldprice' => '770',
    'is_out_of_stock' => '1'
  ],
  [
    'name' => 'INFINIX Zero 8',
    'img_url' => 'https://beon.store/images/detailed/44/Beon.ge_Itel_A48_L6006_Purple__1_.jpg',
    'rate' => '0',
    'brand' => 'Infinix',
    'price' => 'JOD 205.00',
    'oldprice' => '220',
    'is_out_of_stock' => '1'
  ],
  [
    'name' => 'Apple iPhone 12 Pro',
    'img_url' => 'https://i5.walmartimages.com/seo/Pre-Owned-Apple-iPhone-12-Pro-128GB-Silver-Fully-Unlocked-Excellent-Condition_844d1042-b2d1-48db-8b37-2c34f1d94f8d.2e25fcad07148d0a246746cbf1f0537b.jpeg',
    'rate' => '0',
    'brand' => 'Apple',
    'price' => 'JOD 973.00',
    'oldprice' => '1000',
    'is_out_of_stock' => '1'

  ],
  [
    'name' => 'ITEL A48',
    'img_url' => 'https://beon.store/images/detailed/44/Beon.ge_Itel_A48_L6006_Purple__1_.jpg',
    'rate' => '0',
    'brand' => 'iTel',
    'oldprice' => '80',
    'price' => 'JOD 66.00'
  ],
  [
    'name' => 'Samsung Galaxy S21 Ultra',
    'img_url' => 'https://image-us.samsung.com/us/smartphones/galaxy-s21/gallery-images-palette-exclusive/P3-Exclusive-Phantom-Brown/PDP-P3-Phantom-Brown-lockup-01-1600x1200.jpg?$product-details-jpg$',

    'rate' => '0',
    'brand' => 'Samsung',
    'oldprice' => '850',
    'price' => 'JOD 799.00'
  ],

  [
    'name' => 'Galaxy A52',
    'img_url' => 'https://hatif.net/wp-content/uploads/2021/05/Samsung-Galaxy-A52-5G-500x500.jpg',
    'rate' => '0',
    'brand' => 'Samsung',
    'oldprice' => '280',
    'price' => 'JOD 267.00'
  ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mobile Phone | Orange Jordan E shop</title>
  <!-- Copyright © 2014 Monotype Imaging Inc. All rights reserved -->
  <link href="https://cdn.jsdelivr.net/npm/boosted@5.1.3/dist/css/orange-helvetica.min.css" rel="stylesheet" integrity="sha384-ARRzqgHDBP0PQzxQoJtvyNn7Q8QQYr0XT+RXUFEPkQqkTB6gi43ZiL035dKWdkZe" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/boosted@5.1.3/dist/css/boosted.min.css" rel="stylesheet" integrity="sha384-Di/KMIVcO9Z2MJO3EsrZebWTNrgJTrzEDwAplhM5XnCFQ1aDhRNWrp6CWvVcn00c" crossorigin="anonymous">
  <link rel="stylesheet" href="/tasks/orangeStore/css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="https://boosted.orange.com/docs/5.1/assets/brand/orange-logo.svg" width="50" height="50" role="img" alt="Boosted" loading="lazy">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>
        <!-- Added onsubmit="fetchProductInfo(); return false;"
          to the form tag to prevent default form submission behavior. -->
        <form class="d-flex" onsubmit="fetchProductInfo(); return false;">
          <input class="form-control me-2" type="search" placeholder="Search" id="search" aria-label="Search">
          <button class="btn btn-primary" id="searchbtn" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <section class="theMainSection">
    <div class="Menu">
      <div class="listbox">

        <ul class="list">

          <li class="inactive">
            <a href="/en/devices-accessories">
              All
            </a>
          </li>
          <hr class="line">


          <li class="inactive">
            <a href="/en/devices-accessories/devices-with-installment">
              Device &amp; Mobile Phone Installment
            </a>
          </li>
          <hr class="line">


          <li class="inactive">
            <a href="/en/devices-accessories/5g-phones">
              5G Phones
            </a>
          </li>

          <hr class="line">

          <li class="active last">
            <a href="/en/devices-accessories/mobile-phone">
              Mobile Phones
            </a>
          </li>

          <hr class="line">


          <li class="inactive">
            <a href="/en/devices-accessories/mobile-accessories">
              Mobile Accessories
            </a>
          </li>
          <hr class="line">



          <li class="inactive">
            <a href="/en/devices-accessories/smart-watches">
              Smart Watches
            </a>
          </li>

          <hr class="line">


          <li class="inactive">
            <a href="/en/devices-accessories/headphones-earbuds">
              Headphones and Speakers
            </a>
          </li>
          <hr class="line">


          <li class="inactive">
            <a href="/en/devices-accessories/tv">
              Smart TV and Screens
            </a>
          </li>
          <hr class="line">


          <li class="inactive">
            <a href="/en/devices-accessories/smart-audio-video">
              Smart Audio and Video
            </a>
          </li>
          <hr class="line">


          <li class="inactive">
            <a href="/en/devices-accessories/gaming-accessories">
              Gaming accessories
            </a>
          </li>
          <hr class="line">

          <li class="inactive">
            <a href="/en/devices-accessories/tablets-laptops">
              Tablets &amp; Laptops
            </a>
          </li>
          <hr class="line">


          <li class="inactive">
            <a href="/en/devices-accessories/internet-devices">
              Internet Devices
            </a>
          </li>
          <hr class="line">


          <li class="inactive">
            <a href="/en/devices-accessories/fixed-phones">
              Fixed phones devices
            </a>
          </li>
          <hr class="line">


        </ul>
      </div>
    </div>
    <div id="products" class="products">
      <?php
      foreach ($phones as $phone) {
      ?>
        <div class="card">
          <h4 class="card-title productTitle"><?php echo $phone['name']; ?></h4>
          <div class="rating">
            <?php
            $rating = $phone['rate']; //  phone's rating
            $totalStars = 5;

            for ($i = 1; $i <= $totalStars; $i++) {
              if ($i <= $rating) {
                echo '<span class="star filled">★</span>';
              } else {
                echo '<span class="star">★</span>';
              }
            }
            echo '<span class="rating-count">(' . round($rating, 1) . ')</span>';
            ?>
          </div>
          <div class="card-body">
            <img src="<?php echo $phone['img_url']; ?>" class="card-img-top" alt="<?php echo $phone['name']; ?>">
            <p class="card-text oldPrice"><?php echo $phone['oldprice']; ?></p>
            <h5 class="card-title newPrice"><?php echo $phone['price']; ?></h5>
            <a href="#" class="btn btn-primary" style="width: 100%;">view details</a>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </section>
  <script>
    function fetchProductInfo() {
      const searchTerm = document.getElementById("search").value;
      fetch(`http://localhost/tasks/simpleApiOrange/get_product.php`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            search_term: searchTerm
          })
        })
        .then((response) => response.json())
        .then((data) => {
          const products = document.getElementById("products");
          products.innerHTML = ''; // Clear existing products

          data.forEach(phone => {
            const card = document.createElement('div');
            card.className = 'card';
            card.innerHTML = `
              <h4 class="card-title productTitle">${phone.name}</h4>
              <div class="rating">
                ${[...Array(5)].map((_, i) => i < phone.rate ? '<span class="star filled">★</span>' : '<span class="star">★</span>').join('')}
                <span class="rating-count">(${phone.rate})</span>
              </div>
              <div class="card-body">
                <img src="${phone.img_url}" class="card-img-top" alt="${phone.name}">
                <p class="card-text oldPrice">${phone.oldprice}</p>
                <h5 class="card-title newPrice">${phone.price}</h5>
                <a href="#" class="btn btn-primary" style="width: 100%;">view details</a>
              </div>
            `;
            products.appendChild(card);
          });
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/boosted@5.1.3/dist/js/boosted.bundle.min.js" integrity="sha384-5thbp4uNEqKgkl5m+rMBhqR+ZCs+3iAaLIghPWAgOv0VKvzGlYKR408MMbmCjmZF" crossorigin="anonymous"></script>
</body>

</html>