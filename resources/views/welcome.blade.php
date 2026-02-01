<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FoodBizz - Delicious Food Delivered</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

    <!-- Include AOS for animations -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #ff6b35;
            --secondary-color: #f7931e;
            --dark-color: #2d3436;
            --light-color: #fdfdfd;
            --gray-color: #6c757d;
            --shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            --shadow-hover: 0 15px 50px rgba(255, 107, 53, 0.2);
        }

        body {
            font-family: 'Figtree', sans-serif;
            line-height: 1.6;
            color: var(--dark-color);
            background: var(--light-color);
            overflow-x: hidden;
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        nav.scrolled {
            box-shadow: 0 2px 30px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary-color);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo i {
            font-size: 2rem;
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            list-style: none;
            align-items: center;
        }

        .nav-links a {
            color: var(--dark-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            position: relative;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: width 0.3s;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
        }

        .menu-toggle span {
            width: 25px;
            height: 3px;
            background: var(--dark-color);
            transition: all 0.3s;
            border-radius: 3px;
        }

        /* Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            margin-top: 80px;
        }

        /* Hero Section */
        .hero {
            padding: 4rem 0;
            min-height: 90vh;
            display: flex;
            align-items: center;
        }

        .welcome {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .left .heading h1 {
            font-size: 4rem;
            font-weight: 800;
            color: var(--dark-color);
            line-height: 1.2;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .left .text p {
            font-size: 1.2rem;
            color: var(--gray-color);
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-primary,
        .btn-secondary {
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            box-shadow: 0 10px 30px rgba(255, 107, 53, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 107, 53, 0.4);
        }

        .btn-secondary {
            background: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-secondary:hover {
            background: var(--primary-color);
            color: white;
        }

        .right .image {
            position: relative;
        }

        .right .image img {
            width: 100%;
            height: auto;
            filter: drop-shadow(0 20px 50px rgba(0, 0, 0, 0.2));
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%,
            100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        /* About Section */
        .about {
            padding: 6rem 0;
            background: linear-gradient(180deg, #fff 0%, #fff5f0 100%);
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about .title h1 {
            font-size: 3rem;
            font-weight: 800;
            color: var(--dark-color);
            margin-bottom: 1.5rem;
        }

        .about .content p {
            font-size: 1.1rem;
            color: var(--gray-color);
            line-height: 1.8;
        }

        .cards {
            display: grid;
            gap: 1.5rem;
        }

        .card-top,
        .card-bottom {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: var(--shadow);
            transition: all 0.3s;
            border: 1px solid rgba(255, 107, 53, 0.1);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
        }

        .card h4 {
            font-size: 1.3rem;
            color: var(--primary-color);
            margin-bottom: 0.8rem;
            font-weight: 700;
        }

        .card p {
            color: var(--gray-color);
            line-height: 1.6;
        }

        /* Products Section */
        .products {
            padding: 6rem 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-header h2 {
            font-size: 3rem;
            font-weight: 800;
            color: var(--dark-color);
            margin-bottom: 1rem;
        }

        .section-header p {
            font-size: 1.2rem;
            color: var(--gray-color);
        }

        .menu-cardss {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .menu-card {
            background: white;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s;
            border: 1px solid rgba(255, 107, 53, 0.05);
        }

        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
        }

        .menu-card .image {
            position: relative;
            overflow: hidden;
            height: 280px;
            background: linear-gradient(135deg, #fff5f0 0%, #ffe9df 100%);
        }

        .menu-card .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .menu-card:hover .image img {
            transform: scale(1.1);
        }

        .menu-card .content {
            padding: 1.8rem;
        }

        .menu-card .details {
            margin-bottom: 1.5rem;
        }

        .menu-card .details > div {
            margin-bottom: 0.8rem;
            font-size: 1rem;
            color: var(--gray-color);
        }

        .menu-card .title {
            font-weight: 700;
            color: var(--dark-color);
            margin-right: 0.5rem;
        }

        .menu-card button {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(255, 107, 53, 0.3);
        }

        .menu-card button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 107, 53, 0.4);
        }

        /* Contact Section */
        .contact {
            padding: 6rem 0;
            background: linear-gradient(180deg, #fff 0%, #fff5f0 100%);
        }

        .contact-content {
            max-width: 700px;
            margin: 0 auto;
        }

        .form form {
            background: white;
            padding: 3rem;
            border-radius: 25px;
            box-shadow: var(--shadow);
        }

        .form h2 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark-color);
            margin-bottom: 2rem;
            text-align: center;
        }

        .form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark-color);
        }

        .form input,
        .form textarea {
            width: 100%;
            padding: 1rem 1.5rem;
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            font-size: 1rem;
            transition: all 0.3s;
            font-family: 'Figtree', sans-serif;
            margin-bottom: 1.5rem;
        }

        .form input:focus,
        .form textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(255, 107, 53, 0.1);
        }

        .form textarea {
            resize: vertical;
            min-height: 150px;
        }

        .form button[type="submit"] {
            width: 100%;
            padding: 1.2rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 10px 30px rgba(255, 107, 53, 0.3);
        }

        .form button[type="submit"]:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 107, 53, 0.4);
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #2d3436 0%, #1a1d1f 100%);
            color: white;
            padding: 4rem 0 2rem;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .footer-sections {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--secondary-color);
        }

        .contact-info .info-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            color: #ddd;
        }

        .contact-info .info-item i {
            color: var(--primary-color);
            font-size: 1.2rem;
        }

        .quick-links {
            list-style: none;
        }

        .quick-links li {
            margin-bottom: 0.8rem;
        }

        .quick-links a {
            color: #ddd;
            text-decoration: none;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .quick-links a:hover {
            color: var(--primary-color);
            padding-left: 0.5rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .social-icon {
            width: 45px;
            height: 45px;
            background: rgba(255, 107, 53, 0.1);
            border: 2px solid var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            transition: all 0.3s;
            text-decoration: none;
        }

        .social-icon:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-5px);
        }

        .newsletter h4 {
            margin-bottom: 1rem;
            color: #ddd;
        }

        .subscribe-form {
            display: flex;
            gap: 0.5rem;
        }

        .subscribe-form input {
            flex: 1;
            padding: 0.8rem 1rem;
            border: 2px solid rgba(255, 107, 53, 0.3);
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.05);
            color: white;
            font-family: 'Figtree', sans-serif;
        }

        .subscribe-form input::placeholder {
            color: #999;
        }

        .subscribe-form button {
            padding: 0.8rem 1.5rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .subscribe-form button:hover {
            background: var(--secondary-color);
            transform: scale(1.05);
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #999;
        }

        .copyright i {
            color: var(--primary-color);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .nav-links {
                gap: 1.5rem;
            }

            .left .heading h1 {
                font-size: 3rem;
            }

            .menu-cardss {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: flex;
            }

            .nav-links {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 80px);
                background: white;
                flex-direction: column;
                justify-content: flex-start;
                padding: 2rem;
                transition: left 0.3s;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            }

            .nav-links.active {
                left: 0;
            }

            .welcome,
            .about-content {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .right {
                order: -1;
            }

            .left .heading h1 {
                font-size: 2.5rem;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .card-top,
            .card-bottom {
                grid-template-columns: 1fr;
            }

            .section-header h2,
            .about .title h1 {
                font-size: 2.2rem;
            }

            .menu-cardss {
                grid-template-columns: 1fr;
            }

            .footer-sections {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 1rem;
            }

            .nav-container {
                padding: 1rem;
            }

            .logo {
                font-size: 1.5rem;
            }

            .left .heading h1 {
                font-size: 2rem;
            }

            .left .text p {
                font-size: 1rem;
            }

            .section-header h2 {
                font-size: 1.8rem;
            }

            .form form {
                padding: 2rem 1.5rem;
            }

            .menu-card .image {
                height: 220px;
            }

            .btn-primary,
            .btn-secondary {
                padding: 0.8rem 2rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav id="navbar">
        <div class="nav-container">
            <a href="#" class="logo">
                <i class="fas fa-utensils"></i>
                FoodBizz
            </a>
            <ul class="nav-links" id="navLinks">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <div class="menu-toggle" id="menuToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Hero Section -->
        <section class="hero" id="home">
            <div class="welcome" data-aos="fade-up">
                <div class="left">
                    <div class="heading">
                        <h1>Welcome to FoodBizz</h1>
                    </div>
                    <div class="text">
                        <p>
                            Discover a world of flavors at FoodBizz! We bring you the finest culinary delights crafted
                            with passion and care. Whether you're craving a hearty meal or a quick snack, our menu has
                            something for everyone. Explore our offerings and savor the taste of excellence.
                        </p>
                    </div>
                    <div class="cta-buttons">
                        <a href="#menu" class="btn-primary">Explore Menu</a>
                        <a href="#contact" class="btn-secondary">Contact Us</a>
                    </div>
                </div>
                <div class="right">
                    <div class="image parallax">
                        <img src="assets/images/food.png" alt="Delicious food illustration" />
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="about" id="about">
            <div class="about-content" data-aos="fade-right">
                <div class="left">
                    <div class="title">
                        <h1>About FoodBizz</h1>
                    </div>
                    <div class="content">
                        <p>
                            At FoodBizz, we believe food is more than just sustenance—it's an experience. Our team is
                            dedicated to delivering top-quality dishes using fresh ingredients and innovative recipes.
                            Join us on a gastronomic journey that celebrates taste, tradition, and creativity.
                        </p>
                    </div>
                </div>
                <div class="right">
                    <div class="cards">
                        <div class="card-top">
                            <div class="card" data-aos="zoom-in" data-aos-delay="100">
                                <h4><i class="fas fa-leaf"></i> Fresh Ingredients</h4>
                                <p>We source only the best, freshest ingredients for our dishes.</p>
                            </div>
                            <div class="card" data-aos="zoom-in" data-aos-delay="200">
                                <h4><i class="fas fa-user-tie"></i> Expert Chefs</h4>
                                <p>Our skilled chefs craft every meal with precision and love.</p>
                            </div>
                        </div>
                        <div class="card-bottom">
                            <div class="card" data-aos="zoom-in" data-aos-delay="300">
                                <h4><i class="fas fa-shipping-fast"></i> Fast Delivery</h4>
                                <p>Get your food delivered hot and fresh, right to your door.</p>
                            </div>
                            <div class="card" data-aos="zoom-in" data-aos-delay="400">
                                <h4><i class="fas fa-heart"></i> Great Taste</h4>
                                <p>Every bite is a burst of flavor you'll never forget.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Products Section -->
        <section class="products" id="menu">
            <div class="section-header" data-aos="fade-up">
                <h2>Our Delicious Menu</h2>
                <p>Explore our mouth-watering selection of dishes</p>
            </div>
            <div class="products-content">
                <div class="menu-cardss">
                    <div class="menu-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="image">
                            <img src="assets/images/pizza.jpeg" alt="Classic Margherita Pizza" />
                        </div>
                        <div class="content">
                            <div class="details">
                                <div><span class="title">Name:</span>Margherita Pizza</div>
                                <div><span class="title">Price:</span>Ks. 500</div>
                                <div><span class="title">Description:</span>Fresh tomatoes, mozzarella, and basil.
                                </div>
                            </div>
                            <button><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="image">
                            <img src="assets/images/mobile_banner1.jpeg" alt="Spicy Egg Scramble" />
                        </div>
                        <div class="content">
                            <div class="details">
                                <div><span class="title">Name:</span>Spicy Egg Scramble</div>
                                <div><span class="title">Price:</span>Ks. 300</div>
                                <div><span class="title">Description:</span>Scrambled eggs with a kick of spice.</div>
                            </div>
                            <button><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="image">
                            <img src="assets/images/food.png" alt="Grilled Chicken" />
                        </div>
                        <div class="content">
                            <div class="details">
                                <div><span class="title">Name:</span>Grilled Chicken</div>
                                <div><span class="title">Price:</span>Ks. 400</div>
                                <div><span class="title">Description:</span>Juicy chicken with herbs.</div>
                            </div>
                            <button><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="image">
                            <img src="assets/images/food1.png" alt="Pasta Primavera" />
                        </div>
                        <div class="content">
                            <div class="details">
                                <div><span class="title">Name:</span>Pasta Primavera</div>
                                <div><span class="title">Price:</span>Ks. 350</div>
                                <div><span class="title">Description:</span>Fresh veggies and pasta.</div>
                            </div>
                            <button><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="image">
                            <img src="assets/images/food2.png" alt="Burger Deluxe" />
                        </div>
                        <div class="content">
                            <div class="details">
                                <div><span class="title">Name:</span>Burger Deluxe</div>
                                <div><span class="title">Price:</span>Ks. 450</div>
                                <div><span class="title">Description:</span>Beef patty with all the fixings.</div>
                            </div>
                            <button><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="image">
                            <img src="assets/images/food3.png" alt="Chocolate Dessert" />
                        </div>
                        <div class="content">
                            <div class="details">
                                <div><span class="title">Name:</span>Chocolate Dessert</div>
                                <div><span class="title">Price:</span>Ks. 550</div>
                                <div><span class="title">Description:</span>Rich and creamy chocolate treat.</div>
                            </div>
                            <button><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact" id="contact">
            <div class="contact-content">
                <div class="form" data-aos="fade-up">
                    <form>
                        <h2>Get In Touch</h2>
                        <div>
                            <label for="name">Name</label>
                            <input type="text" id="name" placeholder="Enter your name" required />
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="Enter your email" required />
                        </div>
                        <div>
                            <label for="message">Message</label>
                            <textarea id="message" placeholder="Type your message here" required></textarea>
                        </div>
                        <button type="submit">
                            <i class="fas fa-paper-plane"></i> Submit Form
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer" data-aos="fade-up">
            <div class="footer-content">
                <div class="footer-sections">
                    <!-- Contact Information -->
                    <div class="footer-section" data-aos="fade-right">
                        <h3 class="section-title">Contact Us</h3>
                        <div class="contact-info">
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <p>123 Food Street, Culinary City</p>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-phone"></i>
                                <p>+95 123 456 789</p>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-envelope"></i>
                                <p>contact@foodbizz.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="footer-section" data-aos="fade-up">
                        <h3 class="section-title">Quick Links</h3>
                        <ul class="quick-links">
                            <li><a href="#home"><i class="fas fa-chevron-right"></i> Home</a></li>
                            <li><a href="#about"><i class="fas fa-chevron-right"></i> About Us</a></li>
                            <li><a href="#menu"><i class="fas fa-chevron-right"></i> Menu</a></li>
                            <li><a href="#contact"><i class="fas fa-chevron-right"></i> Contact</a></li>
                        </ul>
                    </div>

                    <!-- Social Media & Newsletter -->
                    <div class="footer-section" data-aos="fade-left">
                        <h3 class="section-title">Follow Us</h3>
                        <div class="social-links">
                            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="newsletter">
                            <h4>Subscribe to Newsletter</h4>
                            <form class="subscribe-form">
                                <input type="email" placeholder="Enter your email">
                                <button type="submit"><i class="fas fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="copyright">
                    <p>© 2024 FoodBizz. All rights reserved | Designed with <i class="fas fa-heart"></i> by FoodLovers
                    </p>
                </div>
            </div>
        </footer>
    </div>

    <!-- AOS and Custom Scripts -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Parallax Effect
        window.addEventListener('scroll', function () {
            const parallax = document.querySelector('.parallax');
            if (parallax) {
                let scrollPosition = window.pageYOffset;
                parallax.style.transform = 'translateY(' + scrollPosition * 0.3 + 'px)';
            }
        });

        // Navbar Scroll Effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function () {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mobile Menu Toggle
        const menuToggle = document.getElementById('menuToggle');
        const navLinks = document.getElementById('navLinks');

        menuToggle.addEventListener('click', function () {
            navLinks.classList.toggle('active');
            
            // Animate hamburger icon
            const spans = menuToggle.querySelectorAll('span');
            spans[0].style.transform = navLinks.classList.contains('active') ? 'rotate(45deg) translate(5px, 5px)' : 'none';
            spans[1].style.opacity = navLinks.classList.contains('active') ? '0' : '1';
            spans[2].style.transform = navLinks.classList.contains('active') ? 'rotate(-45deg) translate(7px, -6px)' : 'none';
        });

        // Close mobile menu when clicking on a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                const spans = menuToggle.querySelectorAll('span');
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            });
        });

        // Smooth Scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Form Submission (Basic)
        document.querySelector('.contact form').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Thank you for your message! We will get back to you soon.');
            this.reset();
        });

        document.querySelector('.subscribe-form').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Thank you for subscribing!');
            this.reset();
        });
    </script>
</body>

</html>