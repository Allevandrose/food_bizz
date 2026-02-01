<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FoodBizz</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/view.css')}}">


    <!-- Include AOS for animations -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  
</head>

<body>
    {{-- nav --}}
    <x-navigation/>
    {{-- nav-end --}}
    <div class="container">
        <!-- Hero Section -->
        <div class="hero">
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
                </div>
                <div class="right">
                    <div class="image parallax">
                        <img src="{{asset('assets/images/food.png')}}" alt="Delicious food illustration" />
                    </div>
                </div>
            </div>
        </div>

        <!-- About Section -->
        <div class="about">
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
                            <div class="card" data-aos="zoom-in">
                                <h4>Fresh Ingredients</h4>
                                <p>We source only the best, freshest ingredients for our dishes.</p>
                            </div>
                            <div class="card" data-aos="zoom-in">
                                <h4>Expert Chefs</h4>
                                <p>Our skilled chefs craft every meal with precision and love.</p>
                            </div>
                        </div>
                        <div class="card-bottom">
                            <div class="card" data-aos="zoom-in">
                                <h4>Fast Delivery</h4>
                                <p>Get your food delivered hot and fresh, right to your door.</p>
                            </div>
                            <div class="card" data-aos="zoom-in">
                                <h4>Great Taste</h4>
                                <p>Every bite is a burst of flavor you’ll never forget.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Section -->
        <div class="products">
            <div class="products-content">
                <div class="menu-cardss">
                    <div class="menu-card" data-aos="fade-up">
                        <div class="image">
                            <img src="{{asset('assets/images/pizza.jpeg')}}" alt="Classic Margherita Pizza" />
                        </div>
                        <div class="content">
                            <div class="details">
                                <div><span class="title">Name:</span>Margherita Pizza</div>
                                <div><span class="title">Price:</span>Ks. 500</div>
                                <div><span class="title">Description:</span>Fresh tomatoes, mozzarella, and basil.
                                </div>
                            </div>
                            <button>Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-card" data-aos="fade-up">
                        <div class="image">
                            <img src="{{asset('assets/images/mobile_banner1.jpeg')}}" alt="Spicy Egg Scramble" />
                        </div>
                        <div class="content">
                            <div class="details">
                                <div><span class="title">Name:</span>Spicy Egg Scramble</div>
                                <div><span class="title">Price:</span>Ks. 300</div>
                                <div><span class="title">Description:</span>Scrambled eggs with a kick of spice.</div>
                            </div>
                            <button>Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-card" data-aos="fade-up">
                        <div class="image">
                            <img src="{{asset('assets/images/food.png')}}" alt="Grilled Chicken" />
                        </div>
                        <div class="content">
                            <div class="details">
                                <div><span class="title">Name:</span>Grilled Chicken</div>
                                <div><span class="title">Price:</span>Ks. 400</div>
                                <div><span class="title">Description:</span>Juicy chicken with herbs.</div>
                            </div>
                            <button>Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-card" data-aos="fade-up">
                        <div class="image">
                            <img src="{{asset('assets/images/food1.png')}}" alt="Pasta Primavera" />
                        </div>
                        <div class="content">
                            <div class="details">
                                <div><span class="title">Name:</span>Pasta Primavera</div>
                                <div><span class="title">Price:</span>Ks. 350</div>
                                <div><span class="title">Description:</span>Fresh veggies and pasta.</div>
                            </div>
                            <button>Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-card" data-aos="fade-up">
                        <div class="image">
                            <img src="{{asset('assets/images/food2.png')}}" alt="Burger Deluxe" />
                        </div>
                        <div class="content">
                            <div class="details">
                                <div><span class="title">Name:</span>Burger Deluxe</div>
                                <div><span class="title">Price:</span>Ks. 450</div>
                                <div><span class="title">Description:</span>Beef patty with all the fixings.</div>
                            </div>
                            <button>Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-card" data-aos="fade-up">
                        <div class="image">
                            <img src="{{asset('assets/images/food3.png')}}" alt="Chocolate Dessert" />
                        </div>
                        <div class="content">
                            <div class="details">
                                <div><span class="title">Name:</span>Chocolate Dessert</div>
                                <div><span class="title">Price:</span>Ks. 550</div>
                                <div><span class="title">Description:</span>Rich and creamy chocolate treat.</div>
                            </div>
                            <button>Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="contact">
            <div class="contact-content">
                <div class="form" data-aos="fade-up">
                    <form class="space-y-6">
                        <div>
                            <label for="name" class="block mb-2 text-lg font-medium text-gray-700">Name</label>
                            <input type="text" id="name" placeholder="Enter your name"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-lg font-medium text-gray-700">Email</label>
                            <input type="email" id="email" placeholder="Enter your email"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                        </div>
                        <div>
                            <label for="message" class="block mb-2 text-lg font-medium text-gray-700">Message</label>
                            <textarea id="message" placeholder="Type your message here"
                                class="w-full p-3 border border-gray-300 rounded-lg h-32 resize-none focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
                        </div>
                        <button type="submit"
                            class="bg-orange-600 text-white px-6 py-3 rounded-lg hover:bg-orange-700 transform hover:scale-105 transition-all duration-300">Submit
                            Form</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Updated Footer -->
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
                            <li><a href="#"><i class="fas fa-chevron-right"></i> About Us</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Menu</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Promotions</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Careers</a></li>
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

    <!-- AOS and Parallax Scripts -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });

        window.addEventListener('scroll', function() {
            const parallax = document.querySelector('.parallax');
            let scrollPosition = window.pageYOffset;
            parallax.style.transform = 'translateY(' + scrollPosition * 0.3 + 'px)';
        });
    </script>
</body>

</html>
