<?php
// Path to the Amazon products JSON file
$amazonProductsFile = 'amazon_products.json';

// Fetch and decode the JSON data
$amazonProducts = json_decode(file_get_contents($amazonProductsFile), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover the amazing world of books and their benefits. Explore our curated list of recommended books.">
    <meta name="author" content="BookWorld">
    <title>Vahmahala BookWorld - Why Books Matter</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(120deg, #212121, #424242);
            color: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background: #1b5e20;
            padding: 10px 20px;
            text-align: center;
        }
        header nav {
            display: flex;
            justify-content: space-around;
        }
        header nav a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
        }
        header nav a:hover {
            background: #388e3c;
            border-radius: 5px;
        }
        .container {
            flex: 1;
            max-width: 800px;
            padding: 20px;
            margin: auto;
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 20px;
        }
        footer {
            text-align: center;
            background: #1b5e20;
            color: white;
            padding: 10px 0;
            margin-top: auto;
        }
        @media (max-width: 600px) {
            h1 {
                font-size: 2rem;
            }
            p {
                font-size: 1rem;
            }
        }

        .affiliate-section {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        .affiliate-section h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .affiliate-section p {
            font-size: 1rem;
            color: #bbb;
            margin-bottom: 20px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
        }
        .product {
            background: #333;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s;
        }
        .product:hover {
            transform: scale(1.05);
        }
        .product img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .product p {
            font-size: 0.9rem;
            color: #eee;
        }
    </style>
    <script>
        let countdown = 60; // Countdown in seconds
        const redirect = () => {
            const countdownEl = document.getElementById('countdown');
            if (countdown > 0) {
                countdownEl.textContent = countdown;
                countdown--;
            } else {
                window.location.href = 'books.php';
            }
        };
        setInterval(redirect, 1000);

        const dynamicMessages = [
            "Books hold the key to unlocking worlds unknown, igniting imaginations, and enriching lives.",
            "A reader today, a leader tomorrow! Discover how books can change your perspective.",
            "Each book is a new journey. Start your adventure now!",
            "Knowledge is power, and books are the ultimate tool.",
            "Dive into the magic of stories and the wisdom of knowledge.",
            "Escape the ordinary. Let books take you on an extraordinary journey.",
            "Turn the page, and let a new adventure begin!",
            "Books: Your ticket to explore the past, present, and future.",
            "Feed your mind, one page at a time.",
            "The right book at the right time can change everything."
        ];
        let currentMessageIndex = 0;
        const changeMessage = () => {
            const messageElement = document.getElementById('dynamic-message');
            currentMessageIndex = (currentMessageIndex + 1) % dynamicMessages.length;
            messageElement.textContent = dynamicMessages[currentMessageIndex];
        };
        setInterval(changeMessage, 4000);
    </script>
</head>
<body>
    <header>
        <nav>
            <a href="#">Home</a>
            <a href="about.html">About Us</a>
            <a href="contact.html">Contact Us</a>
        </nav>
    </header>
    <div class="container">
    <img src="assets/images/VH_logo.png" alt="Vamahala BookWorld Logo" style="width: 150px; margin-bottom: 20px;">
        <h1>Welcome to Vamahala BookWorld</h1>
        <p id="dynamic-message">Books hold the key to unlocking worlds unknown, igniting imaginations, and enriching lives.</p>
        <p>Don't worry, the book you're looking for will be here in <span id="countdown" class="countdown">60</span> seconds...</p>
    </div>

    <!-- Affiliate Section -->
    <div class="affiliate-section">
        <h2>Recommended Book Accessories</h2>
        <p>
            We carefully select the best book accessories to enhance your reading experience. By clicking on these links, you not only discover amazing products but also support us.
        </p>
        <div class="product-grid">
            <?php foreach ($amazonProducts as $product): ?>
                <div class="product">
                    <a href="<?= htmlspecialchars($product['link']) ?>" target="_blank">
                        <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                        <p><?= htmlspecialchars($product['name']) ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer>&copy; 2025 Vamahala BookWorld. All rights reserved. TechZED</footer>
</body>
</html>
