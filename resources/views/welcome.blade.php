<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Royale - Tacloban City</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Inter', 'Segoe UI', sans-serif;
            color: #333;
            overflow-x: hidden;
        }

        /* Hero Banner Section */
        .hero-banner {
            position: relative;
            height: 30vh;
            min-height: 400px;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.3)), 
                        url('images/portroyale_bg.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .hero-content {
            text-align: center;
            color: white;
            z-index: 2;
            padding: 0 1rem;
        }

        .hero-content h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            margin-bottom: 1rem;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            animation: fadeInUp 1s ease-out;
        }

        .hero-content p {
            font-size: clamp(1.1rem, 2vw, 1.3rem);
            font-weight: 300;
            opacity: 0.95;
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Main Container */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* Card Styles */
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 2rem;
            padding: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        /* Avatar Section */
        .avatar-card {
            text-align: center;
            height: fit-content;
            top: 2rem;
        }

        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #667eea;
            object-fit: cover;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            transition: transform 0.3s ease;
        }

        .avatar:hover {
            transform: scale(1.05);
        }

        .contact-info {
            background: linear-gradient(135deg, #f8f9ff 0%, #e8f2ff 100%);
            border-radius: 15px;
            padding: 1.5rem;
            border-left: 4px solid #667eea;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: #555;
            font-weight: 500;
            word-break: break-all;
        }

        .contact-item:last-child {
            margin-bottom: 0;
        }

        .contact-item i {
            color: #667eea;
            font-size: 1.1rem;
            width: 25px;
            flex-shrink: 0;
            margin-right: 0.75rem;
        }

        /* Resort Info Card */
        .resort-header {
            margin-bottom: 1.5rem;
        }

        .resort-title {
            color: #2c3e50;
            font-weight: 700;
            font-size: clamp(1.5rem, 3vw, 2rem);
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .location-badge {
            display: inline-flex;
            align-items: center;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 1rem;
            gap: 0.5rem;
        }

        .resort-description {
            color: #555;
            line-height: 1.7;
            font-size: 1rem;
            text-align: justify;
            margin-bottom: 2rem;
        }

        .book-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            width: 100%;
        }

        .book-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }

        /* Statistics Card */
        .stats-card {
            background: linear-gradient(135deg, #00b894, #00a085);
            color: white;
            box-shadow: 0 8px 25px rgba(0, 184, 148, 0.3);
        }

        .stat-content {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .stat-header {
            margin-bottom: 1rem;
        }

        .stat-label {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .stat-description {
            font-size: 0.9rem;
            opacity: 0.9;
            line-height: 1.5;
        }

        .stat-value-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: auto;
            padding-top: 1rem;
        }

        .stat-value {
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-icon {
            font-size: clamp(2rem, 4vw, 2.5rem);
            opacity: 0.9;
        }

        /* Reviews Section */
        .reviews-header {
            color: #2c3e50;
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid #667eea;
        }

        .review-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .review-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .review-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .stars {
            color: #ffd700;
            font-size: 1.2rem;
            margin-bottom: 1rem;
            letter-spacing: 2px;
        }

        .review-text {
            color: #444;
            font-style: italic;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .reviewer-info {
            color: #666;
            font-size: 0.85rem;
            border-top: 1px solid #eee;
            padding-top: 1rem;
            line-height: 1.4;
        }

        .reviewer-name {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.25rem;
        }

        /* Placeholder Content */
        .placeholder-card {
            background: linear-gradient(135deg, #f8f9ff 0%, #e8f2ff 100%);
            border-radius: 20px;
            height: 200px;
            border: 2px dashed #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-style: italic;
            text-align: center;
            padding: 2rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-banner {
                height: 50vh;
                min-height: 300px;
            }

            .glass-card {
                padding: 1.5rem;
                margin-bottom: 1.5rem;
            }

            .avatar-card {
                position: static;
                margin-bottom: 2rem;
            }

            .stat-value-container {
                justify-content: flex-start;
                padding-top: 1.5rem;
            }

            .contact-item {
                font-size: 0.9rem;
            }

            .resort-description {
                text-align: left;
            }
        }

        @media (max-width: 576px) {
            .main-container {
                padding: 0 0.5rem;
            }

            .glass-card {
                padding: 1rem;
            }

            .hero-content h1 {
                letter-spacing: 1px;
            }

            .location-badge {
                font-size: 0.8rem;
                padding: 0.4rem 0.8rem;
            }
        }

        /* Loading Animation */
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <!-- Hero Banner -->
    <div class="hero-banner">
        <div class="hero-content">
            <h1>PORT ROYALE</h1>
            <p>Where Luxury Meets Comfort  </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-container">
        <div class="row g-4">
            <!-- Left Column - Avatar & Contact -->
            <div class="col-lg-3 col-md-4">
                <div class="glass-card avatar-card fade-in">
                    <img src="images/portroyale_avatar.jpg" class="avatar" alt="Resort Manager">

                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="bi bi-telephone-fill"></i>
                            <span>+960 775-8844</span>
                        </div>
                        <div class="contact-item">
                            <i class="bi bi-envelope-fill"></i>
                            <span>reservations@sunsetbeach.mv</span>
                        </div>
                        <div class="contact-item">
                            <i class="bi bi-globe"></i>
                            <span>reservations@sunsetbeach.mv</span>
                        </div>
                        <div class="contact-item">
                            <i class="bi bi-whatsapp"></i>
                            <span>+960 775-8844</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Center Column - Main Content -->
            <div class="col-lg-6 col-md-8">
                <!-- Resort Information -->
                <div class="glass-card fade-in">
                    <div class="resort-header">
                        <h2 class="resort-title">Port Royale - Manlurip</h2>
                        <div class="location-badge">
                            <i class="bi bi-geo-alt-fill"></i>
                            Tacloban City, Leyte, Philippines
                        </div>
                    </div>
                    
                    <p class="resort-description">
                       Nestled in the tranquil barangay of Manlurip, Port Royale offers a refreshing escape with its blend of tropical charm and luxurious comfort. Whether you're planning a serene weekend getaway or a private family celebration, Port Royale is the perfect seaside destination.

Enjoy scenic views, relaxing sea breezes, and top-tier amenities designed to make your visit unforgettable. Perfect for intimate events, romantic sunsets, or simply soaking in the peaceful coastal vibe.


                    </p>
                    
                </div>

                <!-- Statistics Section -->
                <div class="glass-card stats-card fade-in">
                    <div class="stat-content">
                        <div class="stat-header">
                            <div class="stat-label">Guest Satisfaction Rate</div>
                            <div class="stat-description">
                                Based on 2,847 verified reviews from guests who stayed in the last 12 months. 
                                Our commitment to excellence ensures unforgettable experiences.
                            </div>
                        </div>
                        <div class="stat-value-container">
                            <div class="stat-value">
                                <i class="bi bi-trophy-fill stat-icon"></i>
                                <span>97.8%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Placeholder Content -->
                <div class="placeholder-card fade-in">
                    <p>Resort Gallery & Amenities Coming Soon</p>
                </div>
            </div>

            <!-- Right Column - Reviews -->
            <div class="col-lg-3 col-md-12">
                <div class="glass-card fade-in">
                    <div class="d-flex justify-content-between align-items-center reviews-header">
    <h3 class="m-0">Guest Reviews</h3>
    <button class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1" >
        <i class="bi bi-stars"></i>
        <span>Summarize</span>
    </button>
</div>


                    <div class="review-card">
 
                        <p class="review-text">"Absolutely magical experience! The overwater villa was stunning and the staff went above and beyond to make our honeymoon perfect."</p>
                        <div class="reviewer-info">
                            <div class="reviewer-name">Sarah & Mike Johnson</div>
                            <div>Honeymoon Suite • December 2024</div>
                        </div>
                    </div>

                    <div class="review-card">

                        <p class="review-text">"Best family vacation ever! Kids loved the water sports and we enjoyed the spa. Crystal clear waters and incredible sunsets every night."</p>
                        <div class="reviewer-info">
                            <div class="reviewer-name">The Martinez Family</div>
                            <div>Beach Villa • November 2024</div>
                        </div>
                    </div>

                    <div class="review-card">

                        <p class="review-text">"Exceptional service and pristine facilities. The underwater restaurant was a highlight. Will definitely return for our anniversary!"</p>
                        <div class="reviewer-info">
                            <div class="reviewer-name">David Chen</div>
                            <div>Premium Suite • October 2024</div>
                        </div>
                    </div>

                    <div class="review-card">
                        <p class="review-text">"Beautiful resort with amazing snorkeling. The spa treatments were world-class. Only minor issue was wifi in some areas."</p>
                        <div class="reviewer-info">
                            <div class="reviewer-name">Emma Thompson</div>
                            <div>Garden Villa • September 2024</div>
                        </div>
                    </div>

                    <div class="review-card">
                        <div class="stars">★★★★★</div>
                        <p class="review-text">"Perfect romantic getaway! Private beach dinners and sunset cruise were unforgettable. Staff remembered every detail of our preferences."</p>
                        <div class="reviewer-info">
                            <div class="reviewer-name">Alessandro & Sofia</div>
                            <div>Overwater Villa • August 2024</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add smooth scrolling and animation on scroll
        window.addEventListener('scroll', () => {
            const cards = document.querySelectorAll('.glass-card');
            cards.forEach(card => {
                const rect = card.getBoundingClientRect();
                const isVisible = rect.top < window.innerHeight && rect.bottom > 0;
                
                if (isVisible) {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }
            });
        });

        // Initialize animations
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.fade-in');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });
    </script>
</body>
</html>