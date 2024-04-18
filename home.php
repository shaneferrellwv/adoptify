#!/usr/local/bin/php

<?php
    include('includes/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptify Homepage</title>
    <style>
        /* Global Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Inter, sans-serif;
            background-color: #d3d3d3;
        }

        .container {
            display: flex;
            flex-direction: column;
            height: 100vh;
            position: relative; /* Added */
        }

        .header {
            background-color: #A7C7E7;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }

        /* Navigation Bar Styles */
        .navbar {
            text-align: center; /* Center the navigation links */
        }

            .navbar ul {
                list-style-type: none;
                padding: 0;
                margin: 0;
            }

            .navbar li {
                display: inline-block;
                padding: 10px;
                cursor: pointer;
                color: #000000;
            }

                .navbar li:hover {
                    background-color: #d3d3d3;
                }

        /* Main Content Styles */
        .main-content {
            flex-grow: 1;
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        .content-box {
            flex-grow: 1; /* Occupy available space */
            background-color: #60A3D9;
            padding: 20px;
            border-radius: 10px;
            text-align: center; /* Center text */
            border: 1px solid #ccc; /* Add border */
        }

        .button-container {
            display: flex;
            flex-direction: column; /* Align items vertically */
            height: 100%; /* Ensure the button container fills the height of the content box */
        }

        .button {
            padding: 15px 30px; /* Increase button padding */
            background-color: #2354a0;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px; /* Increase font size */
            margin-top: 20px; /* Add space between buttons */
        }

        /* Logo Styles */
        .logo {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

            .logo img {
                max-width: 300px; /* Set maximum width for the logo */
                height: auto; /* Maintain aspect ratio */
            }

        /* Footer Styles */
        .footer {
            background-color: #60A3D9;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        /* Carousel Styles */
        .carousel-item {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
            z-index: 1; /* Ensure the buttons appear above the cards */
            position: absolute; /* Added */
            top: calc(50% + 200px); /* Adjusted */
        }

        .carousel-control-prev {
            left: 10px; /* Adjusted */
        }

        .carousel-control-next {
            right: 0px; /* Adjusted */
        }

        /* Previous and Next Button Styles */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-image: url('https://img.icons8.com/material-outlined/24/000000/long-arrow-left.png');
            width: 24px;
            height: 24px;
            background-size: contain;
            background-repeat: no-repeat;
        }

        .carousel-control-next-icon {
            background-image: url('https://img.icons8.com/material-outlined/24/000000/long-arrow-right.png');
        }

        @media (max-width: 768px) {
            .carousel-item {
                max-width: 80%; /* Reduce the maximum width of carousel items */
                margin: 0 auto; /* Center the carousel */
            }

            .carousel-control-prev,
            .carousel-control-next {
                width: 10%; /* Adjust the width of previous and next buttons */
                top: 40%; /* Position the buttons vertically centered */
            }
        }

    </style>
</head>
<body>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <!-- Embed image -->
            <div class="logo">
                <img src="Animals.png" alt="Animals" style="width: 300px;">
                <img src="Adoptify_logo.png" alt="Adoptify Logo" style="width: 300px;">
                <img src="Animals.png" alt="Animals" style="width: 300px;">
            </div>
        </div>

        <!-- Navigation Bar -->
        <div class="navbar">
            <ul>
                <li id="homeButton" onclick="window.location.href = 'index.html'">Home</li>
                <li id="adoptButton" onclick="window.location.href = 'browse-pets.html'">Adopt</li>
                <li id="listButton" onclick="window.location.href = 'list-pets.html'">List</li>
                <li id="settingsButton" onclick="window.location.href = 'settings.html'">Settings</li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Left Content Box -->
            <div class="content-box">
                <div class="button-container">
                    <h2>List a Pet</h2>
                    <button class="button" onclick="window.location.href = 'list-pets.html'">List</button>
                </div>
            </div>

            <!-- Right Content Box -->
            <div class="content-box">
                <div class="button-container">
                    <h2>Adopt a Pet</h2>
                    <button class="button" onclick="window.location.href = 'browse-pets.html'">Search</button>
                </div>
            </div>
        </div>

        <!-- Carousel for Adoptable Pets -->
        <h2 style="text-align:center;color: #000;">Our most Faithful Friends</h2>
        <div id="adoptCarousel" class="carousel slide mt-4" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card-deck" style="display: flex; justify-content: center;">
                        <!-- Logo -->
                        <div class="card" style="border: 1px solid #ccc; background-color: #f8f9fa; padding: 10px;">
                            <img src="logo.png" alt="Adoptify Logo" style="width: 200px;">
                        </div>
                        <!-- Animal Cards -->
                        <div class="card" style="border: 1px solid #ccc; background-color: #f8f9fa; padding: 10px;">
                            <img src="Animal1.png" alt="Pet Name 1" style="width: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">Pet Name 1</h5>
                                <p class="card-text">Description of pet 1</p>
                            </div>
                        </div>
                        <!-- Repeat this structure for other cards -->
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#adoptCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#adoptCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <!-- Footer -->
        <div class="footer">
            &copy; 2024 Adoptify. All rights reserved.
        </div>

        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-WLq2uY0xFsq/W8pY9i09B6kYYKvDNDpTmF4nM+qmqPv88WDsTz9sYtHTx1/ON8CJ6B5Zti0jvIYkgmqVL1phlA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- JavaScript for Carousel Functionality -->
        <script>
            $(document).ready(function () {
                var animals = [
                    { name: "Pet Name 1", description: "Description of pet 1", image: "logo.png" },
                    { name: "Pet Name 2", description: "Description of pet 2", image: "logo.png" },
                    { name: "Pet Name 3", description: "Description of pet 3", image: "logo.png" },
                    { name: "Pet Name 4", description: "Description of pet 4", image: "logo.png" },
                    { name: "Pet Name 5", description: "Description of pet 5", image: "logo.png" },
                    { name: "Pet Name 6", description: "Description of pet 6", image: "logo.png" },
                    { name: "Pet Name 7", description: "Description of pet 7", image: "logo.png" },
                    { name: "Pet Name 8", description: "Description of pet 8", image: "logo.png" },
                    { name: "Pet Name 9", description: "Description of pet 9", image: "logo.png" },
                    { name: "Pet Name 10", description: "Description of pet 10", image: "logo.png" },
                    { name: "Pet Name 11", description: "Description of pet 11", image: "logo.png" },
                    { name: "Pet Name 12", description: "Description of pet 12", image: "logo.png" },
                    // Add more animals as needed
                ];

                var currentIndex = 0;

                function loadAnimalCards() {
                    var carouselInner = document.querySelector('.carousel-inner');
                    var cardDeck = carouselInner.querySelector('.card-deck');
                    cardDeck.innerHTML = ''; // Clear existing content

                    for (var i = currentIndex; i < Math.min(currentIndex + 6, animals.length); i++) {
                        var animal = animals[i];
                        var card = `
                                       <div class="card" style="border: 1px solid #ccc; background-color: #f8f9fa; padding: 10px;">
                                                 <img src="${animal.image}" alt="${animal.name}" style="width: 200px;">
                                                    <div class="card-body">
                                                     <h5 class="card-title">${animal.name}</h5>
                                                     <p class="card-text">${animal.description}</p>
                                                 </div>
                                       </div>
                                    `;
                        cardDeck.innerHTML += card;
                    }
                }

                loadAnimalCards(); // Initial load of animal cards

                $('.carousel-control-prev').click(function () {
                    if (currentIndex > 0) {
                        currentIndex--;
                        loadAnimalCards();
                    }
                });

                $('.carousel-control-next').click(function () {
                    if (currentIndex + 6 < animals.length) {
                        currentIndex++;
                        loadAnimalCards();
                    }
                });
            });

        </script>
    </div>
</body>
</html>

    <?php include('theme/footer.php'); ?>
</body>
</html>
