<x-app-layout>
    <div class="hero-section">
        <div class="motivation">
            <h1>Welcome to Your Next Favorite Food Delivery</h1>
            <p>Craving something delicious? Browse a variety of tasty dishes, order from your favorite restaurants, and have it delivered right to your door in no time!</p>
            <a href="{{ route('user.dashboard') }}" class="cta-button">Order Now</a>
        </div>
        
    </div>
    <div class="benefits-section">
        <h2>Why Order From Us?</h2>
        <div class="benefit">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="2" y1="12" x2="22" y2="12"></line>
                <line x1="12" y1="2" x2="12" y2="22"></line>
            </svg>
            <h3>Fast & Reliable Delivery</h3>
            <p>Enjoy prompt delivery, bringing your favorite meals straight to your door, anytime you need it.</p>
        </div>
        <div class="benefit">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                <line x1="12" y1="1" x2="12" y2="23"></line>
                <path d="M18 3C18 5.21 15.21 7 12 7C8.79 7 6 5.21 6 3"></path>
                <path d="M6 3C6 5.21 8.79 7 12 7C15.21 7 18 5.21 18 3"></path>
            </svg>
            <h3>Affordable Prices</h3>
            <p>Order your favorite dishes without breaking the bank. We offer great food at competitive prices.</p>
        </div>
        <div class="benefit">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M9 11l3 3L22 4"></path>
            </svg>
            <h3>Easy to Use</h3>
            <p>Our simple and intuitive platform makes ordering food a breeze, with a seamless checkout process.</p>
        </div>
    </div>
    <div class="featured-dishes">
        <h2>Our Featured Dishes</h2>
        <div class="dish-container">
            <div class="dish">
                <img src="{{ asset('images/1.jpg') }}" alt="Classic Cheeseburger">
                <h3>Classic Cheeseburger</h3>
                <p>A juicy beef patty with melted cheddar cheese, fresh lettuce, tomato, and our signature sauce, all sandwiched between soft toasted buns.</p>
            </div>
            <div class="dish">
                <img src="{{ asset('images/2.webp') }}" alt="BBQ Bacon Burger">
                <h3>BBQ Bacon Burger</h3>
                <p>A mouth-watering burger topped with crispy bacon, smoky BBQ sauce, cheddar cheese, and fresh vegetables, served on a warm bun.</p>
            </div>
            <div class="dish">
                <img src="{{ asset('images/3.jpg') }}" alt="Veggie Burger">
                <h3>Veggie Burger</h3>
                <p>A wholesome plant-based patty made from vegetables, served with fresh greens, tomato, and a vegan mayo sauce.</p>
            </div>
            <div class="dish">
                <img src="{{ asset('images/4.webp') }}" alt="Chocolate Lava Cake">
                <h3>Chocolate Lava Cake</h3>
                <p>A rich, gooey chocolate cake with a molten center, served with a scoop of vanilla ice cream and drizzled with chocolate syrup.</p>
            </div>
            <div class="dish">
                <img src="{{ asset('images/5.jpg') }}" alt="Strawberry Cheesecake">
                <h3>Strawberry Cheesecake</h3>
                <p>A creamy and smooth cheesecake with a buttery graham cracker crust, topped with fresh strawberries and a sweet strawberry glaze.</p>
            </div>
            <div class="dish">
                <img src="{{ asset('images/6.jpg') }}" alt="Fresh Lemonade">
                <h3>Fresh Lemonade</h3>
                <p>A refreshing drink made with freshly squeezed lemons, sweetened to perfection, and served over ice with a slice of lemon for garnish.</p>
            </div>

            <div class="dish">
                <img src="{{ asset('images/7.jpg') }}" alt="Mushroom Swiss Burger">
                <h3>Mushroom Swiss Burger</h3>
                <p>A savory burger topped with sautéed mushrooms, melted Swiss cheese, and our creamy garlic mayo sauce, all on a toasted brioche bun.</p>
            </div>
            <div class="dish">
                <img src="{{ asset('images/8.jpg') }}" alt="Vanilla Ice Cream Sundae">
                <h3>Vanilla Ice Cream Sundae</h3>
                <p>A delicious scoop of creamy vanilla ice cream topped with hot fudge, whipped cream, and a cherry on top.</p>
            </div>
            <div class="dish">
                <img src="{{ asset('images/9.webp') }}" alt="Iced Coffee">
                <h3>Iced Coffee</h3>
                <p>A smooth and refreshing iced coffee, perfect for a cool pick-me-up, served with a splash of milk and ice cubes.</p>
            </div>
            <div class="dish">
                <img src="{{ asset('images/10.jpg') }}" alt="Apple Pie">
                <h3>Apple Pie</h3>
                <p>A warm and flavorful apple pie with a golden, flaky crust, served with a scoop of vanilla ice cream for the perfect finish.</p>
            </div>
        </div>
    </div>
    
    <div class="restaurant-benefits-section">
        <h2>Why Choose Us for Your Next Meal?</h2>
        <div class="benefits-container">
            <div class="benefit">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck">
                    <rect x="1" y="3" width="15" height="10" rx="2" ry="2"></rect>
                    <path d="M5 13V9a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4"></path>
                    <path d="M3 16h18v4H3z"></path>
                </svg>
                <h3>Fast and Convenient Delivery</h3>
                <p>Get your favorite meals delivered to your doorstep in no time, so you can enjoy delicious food from the comfort of your home.</p>
            </div>
            <div class="benefit">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard">
                    <path d="M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zm-7 14H7v-2h5v2zm4-4H7v-2h11v2zm-4-4H7V7h7v2z"></path>
                </svg>
                <h3>Browse a Wide Variety of Dishes</h3>
                <p>Explore an extensive menu with a wide selection of mouth-watering options to satisfy every craving.</p>
            </div>
            <div class="benefit">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                    <rect x="1" y="4" width="22" height="16" rx="3" ry="3"></rect>
                    <path d="M1 10h22"></path>
                </svg>
                <h3>Secure and Easy Payments</h3>
                <p>Enjoy a seamless, secure payment experience with multiple options to choose from for a hassle-free checkout.</p>
            </div>
        </div>
    </div>
    <div class="customer-feedback">
        <h2>What Our Customers Are Saying</h2>
        <div class="feedback-container">
            <div class="feedback">
                <p>"The food was delicious, and the delivery was so fast! I will definitely order again."</p>
                <h4>- Sarah L.</h4>
            </div>
            <div class="feedback">
                <p>"Best burger I've had in a long time! The quality and flavors are top-notch. Highly recommend!"</p>
                <h4>- James M.</h4>
            </div>
            <div class="feedback">
                <p>"Amazing service! The delivery was prompt, and the food was still hot and fresh. I'm impressed."</p>
                <h4>- Jessica R.</h4>
            </div>
            <div class="feedback">
                <p>"The chocolate lava cake was to die for! Perfectly gooey inside. I'll be back for more!"</p>
                <h4>- Michael S.</h4>
            </div>
            <div class="feedback">
                <p>"I love the variety of options on the menu! Everything I’ve tried so far has been fantastic."</p>
                <h4>- Emma T.</h4>
            </div>
            <div class="feedback">
                <p>"The iced coffee was so refreshing, and the burger was packed with flavor. A great experience!"</p>
                <h4>- David W.</h4>
            </div>
        </div>
    </div>
    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-about">
                <h3>About Us</h3>
                <p>Your go-to platform for delicious food delivered straight to your doorstep. Experience the best flavors, hassle-free!</p>
            </div>
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#feedback">Feedback</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-social">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3c-2.21 0-4 1.79-4 4v3H9v4h2v8h4v-8h3l1-4h-4V6c0-.55.45-1 1-1h3z"></path></svg></a>
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path></svg></a>
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1112.63 8a4 4 0 013.37 3.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Food Delivery App. All rights reserved.</p>
        </div>
    </footer>
    
    
    
    
    
</x-app-layout>

<style>
    .site-footer {
    background-color: #333;
    color: #fff;
    padding: 40px 20px;
    font-family: Arial, sans-serif;
}

.footer-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
}

.footer-about,
.footer-links,
.footer-social {
    flex: 1;
    min-width: 250px;
    margin: 0 10px;
}

.footer-about h3,
.footer-links h3,
.footer-social h3 {
    font-size: 1.5rem;
    margin-bottom: 20px;
    color: #fff;
}

.footer-about p {
    font-size: 1rem;
    line-height: 1.5;
    color: #ccc;
}

.footer-links ul {
    list-style: none;
    padding: 0;
}

.footer-links li {
    margin-bottom: 10px;
}

.footer-links a {
    color: #ddd;
    text-decoration: none;
    font-size: 1rem;
}

.footer-links a:hover {
    color: #ff8c00;
}

.social-icons {
    display: flex;
    gap: 10px;
}

.social-icons a {
    color: #fff;
    transition: color 0.3s ease;
}

.social-icons a:hover {
    color: #ff8c00;
}

.footer-bottom {
    text-align: center;
    padding: 10px 20px;
    background-color: #222;
    margin-top: 20px;
    color: #aaa;
}

.footer-bottom p {
    margin: 0;
    font-size: 0.9rem;
}

</style>
<style>
    .customer-feedback {
        text-align: center;
        padding: 60px 20px;
        background-color: #f9f9f9;
    }

    .customer-feedback h2 {
        font-size: 2.5rem;
        margin-bottom: 40px;
        color: #333;
    }

    .feedback-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .feedback {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .feedback p {
        font-size: 1.1rem;
        color: #555;
        margin-bottom: 15px;
        font-style: italic;
    }

    .feedback h4 {
        font-size: 1.2rem;
        font-weight: 600;
        color: #333;
    }

    .feedback:hover {
        transform: translateY(-10px);
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .feedback-container {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 480px) {
        .feedback-container {
            grid-template-columns: 1fr;
        }
    }

</style>
<style>
    .featured-dishes {
        text-align: center;
        margin: 50px 0;
    }
    .featured-dishes h2{
        font-size: 60px;
    }

    .dish-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    .dish {
        width: 250px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 10px;
        border-radius: 10px;
        transition: transform 0.3s;
    }

    .dish img {
        width: 100%;
        border-radius: 8px;
    }

    .dish h3 {
        font-size: 18px;
        font-weight: bold;
        margin-top: 10px;
    }

    .dish p {
        font-size: 14px;
        color: #555;
    }

    .dish:hover {
        transform: translateY(-10px);
    }

</style>
<style>
    .restaurant-benefits-section {
        background-color: #c6a8ff;
        text-align: center;
        padding: 60px 20px;
    }
    .benefits-container{
        
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .restaurant-benefits-section h2 {
        font-size: 2.5rem;
        margin-bottom: 40px;
        color: #333;
    }

    .benefit {
        background-color: #f9f9f9;
        padding: 25px;
        margin: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        max-width: 300px;
        margin-left: auto;
        margin-right: auto;
    }

    .benefit svg {
        margin-bottom: 15px;
        color: #00aaff; /* Blue color for icons */
    }

    .benefit h3 {
        font-size: 1.75rem;
        margin-bottom: 15px;
    }

    .benefit p {
        font-size: 1rem;
        color: #666;
    }

</style>
<style>
    .benefits-section {
        background-color: #9bc7ff;
        text-align: center;
        padding: 60px 20px;
    }

    .benefits-section h2 {
        font-size: 2.5rem;
        margin-bottom: 40px;
    }

    .benefit {
        background-color: #ffffff;
        padding: 20px;
        margin: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 300px;
        margin-left: auto;
        margin-right: auto;
    }

    .benefit svg {
        margin-bottom: 15px;
        color: #4CAF50;
    }

    .benefit h3 {
        font-size: 1.75rem;
        margin-bottom: 15px;
    }

    .benefit p {
        font-size: 1rem;
        color: #555555;
    }


</style>
<style>
    .hero-section {
        background-image: url("{{ asset('images/background.jpg') }}");  
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: white; 
        text-align: center; 
        padding: 100px 20px;  
        height: 90vh;
        display: flex;
        justify-content: center; 
        align-items: center;
    }
    .motivation{
        width: 60%;
        background-color: #ffffffd5;
        padding: 16px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        backdrop-filter: blur(5px); 
    }

    .hero-section h1 {
        font-size: 3rem; 
        margin-bottom: 20px;
        color: black;
    }

    .hero-section p {
        font-size: 1.25rem;
        margin-bottom: 30px; 
        max-width: 800px; 
        margin-left: auto;
        margin-right: auto; 
        color: black;
    }

    .cta-button {
        background-color: #4CAF50; 
        color: white;  
        padding: 12px 24px;  
        text-decoration: none;  
        border-radius: 5px; 
        font-size: 1.1rem;  
        display: inline-block;
        margin-top: 20px;
        transition: background-color 0.3s ease;  
    }

    .cta-button:hover {
        background-color: #45a049; 
    }
</style>