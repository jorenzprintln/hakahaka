<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Royale - Tacloban City</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <style>
        /* Define your dark theme colors */
        :root {
            --dark-primary: #1a1a2e;
            /* Deep dark background */
            --dark-secondary: #16213e;
            /* Slightly lighter dark for cards */
            --purple-accent-light: #e0b0ff;
            /* Light purple for highlights */
            --purple-accent-dark: #663399;
            /* Darker purple for main accents */
            --text-light: #e0e0e0;
            /* Light gray text */
            --text-muted: #aaaaaa;
            /* Muted gray text */
            --white: #ffffff;
            --yellow-star: #ffd700;
            /* Star rating color */
            --green-success: #00b894;
            --blue-info: #48dbfb;
            --red-danger: #ff6b6b;
            --orange-warning: #ffbe76;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background:linear-gradient(180deg, #1a1a2e, #231136);
            min-height: 100vh;
            font-family: 'Inter', 'Segoe UI', sans-serif;
            color: var(--text-light);
            overflow-x: hidden;
        }

        /* Hero Banner Section */
        .hero-banner {
            position: relative;
            height: 30vh;
            min-height: 400px;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)),
                url('{{ asset('images/portroyale_bg.jpg') }}');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
            border-bottom: 5px solid var(--purple-accent-dark);
            /* Subtle accent */
        }

        .hero-content {
            text-align: center;
            color: var(--white);
            z-index: 2;
            padding: 0 1rem;
        }

        .hero-content h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            margin-bottom: 1rem;
            letter-spacing: 2px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 2);
            animation: fadeInUp 1s ease-out;
        }

        .hero-content p {
            font-size: clamp(1.1rem, 2vw, 1.3rem);
            font-weight: 300;
            opacity: 0.95;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 2);
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
            background: rgba(26, 26, 46, 0.85);
            /* Darker translucent background */
            backdrop-filter: blur(15px);
            border-radius: 15px;
            /* Slightly less rounded */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            /* Darker, more pronounced shadow */
            border: 1px solid rgba(102, 51, 153, 0.3);
            /* Purple border */
            margin-bottom: 2rem;
            padding: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5);
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
            border: 4px solid var(--purple-accent-light);
            /* Accent border */
            object-fit: cover;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 20px rgba(102, 51, 153, 0.5);
            /* Purple shadow */
            transition: transform 0.3s ease;
        }

        .avatar:hover {
            transform: scale(1.05);
        }

        .contact-info {
            background: rgba(22, 33, 62, 0.7);
            /* Slightly lighter dark */
            border-radius: 10px;
            padding: 1.5rem;
            border-left: 4px solid var(--purple-accent-light);
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: var(--text-light);
            font-weight: 500;
            word-break: break-all;
        }

        .contact-item:last-child {
            margin-bottom: 0;
        }

        .contact-item i {
            color: var(--purple-accent-light);
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
            color: var(--purple-accent-light);
            /* Purple title */
            font-weight: 700;
            font-size: clamp(1.5rem, 3vw, 2rem);
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .location-badge {
            display: inline-flex;
            align-items: center;
            background: var(--purple-accent-dark);
            color: var(--white);
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 1rem;
            gap: 0.5rem;
        }

        .resort-description {
            color: var(--text-light);
            line-height: 1.7;
            font-size: 1.0rem;
            text-align: justify;
            margin-bottom: 2rem;
        }

        .book-btn {
            background: linear-gradient(135deg, var(--purple-accent-dark), var(--purple-accent-light));
            border: none;
            color: var(--white);
            padding: 0.75rem 2rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 51, 153, 0.4);
            width: 100%;
        }

        .book-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 51, 153, 0.6);
            color: var(--white);
        }

        /* Statistics Card */
        .stats-card {
            background: linear-gradient(135deg, #0f3460, #16213e);
            /* Dark blue to dark purple */
            color: var(--text-light);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
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
            color: var(--purple-accent-light);
            /* Accent label */
        }

        .stat-description {
            font-size: 0.9rem;
            opacity: 0.9;
            line-height: 1.5;
            color: var(--text-muted);
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
            color: var(--purple-accent-light);
            /* Accent icon */
        }

        /* Reviews Section */
        .reviews-header {
            color: var(--purple-accent-light);
            /* Accent heading */
            font-weight: 700;
            font-size: 1.3rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid var(--purple-accent-dark);
        }

        /* NEW CSS for the scrollable reviews container */
        #reviews-scroll-container {
            max-height: 450px;
            /* Adjust this height as needed (e.g., 400px, 500px, 600px) */
            overflow-y: auto;
            /* Enable vertical scrollbar if content overflows */
            padding-right: 15px;
            /* Add padding to prevent text from touching scrollbar */
            box-sizing: border-box;
            /* Include padding in the element's total width and height */
            margin-top: 1.5rem;
            /* Space between the header and the scrollable reviews */
        }

        /* Optional: Style the scrollbar for Webkit browsers (Chrome, Safari, Edge) */
        #reviews-scroll-container::-webkit-scrollbar {
            width: 8px;
            /* Width of the scrollbar */
        }

        #reviews-scroll-container::-webkit-scrollbar-track {
            background: var(--dark-secondary);
            /* Darker track */
            border-radius: 10px;
        }

        #reviews-scroll-container::-webkit-scrollbar-thumb {
            background: var(--purple-accent-dark);
            /* Purple handle */
            border-radius: 10px;
        }

        #reviews-scroll-container::-webkit-scrollbar-thumb:hover {
            background: var(--purple-accent-light);
            /* Lighter purple on hover */
        }


        .review-card {
            background: var(--dark-secondary);
            /* Dark card background */
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(102, 51, 153, 0.2);
            /* Purple border */
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
            background: linear-gradient(135deg, var(--purple-accent-dark), var(--purple-accent-light));
        }

        .review-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        }

        .stars {
            color: var(--yellow-star);
            font-size: 1.2rem;
            margin-bottom: 1rem;
            letter-spacing: 2px;
        }

        .review-text {
            color: var(--text-light);
            font-style: italic;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .reviewer-info {
            color: var(--text-muted);
            font-size: 0.85rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            /* Lighter border */
            padding-top: 1rem;
            line-height: 1.4;
        }

        .reviewer-name {
            font-weight: 600;
            color: var(--purple-accent-light);
            /* Accent name */
            margin-bottom: 0.25rem;
        }

        /* Placeholder Content */
        .placeholder-card {
            background: var(--dark-secondary);
            border-radius: 15px;
            height: 200px;
            border: 2px dashed rgba(102, 51, 153, 0.4);
            /* Purple dashed border */
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-style: italic;
            text-align: center;
            padding: 2rem;
        }

        /* Chart specific styles */
        .chart-container {
            position: relative;
            height: 250px;
            /* Adjusted height for charts to fit better in a 2x2 grid */
            width: 100%;
            padding: 0 10px;
            /* Added padding to prevent charts from touching edges */
            box-sizing: border-box;
        }

        .chart-section-title {
            color: var(--purple-accent-light);
            font-weight: 700;
            font-size: 1.5rem;
            text-align: center;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .chart-card-title {
            color: var(--purple-accent-light);
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            text-align: center;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid rgba(102, 51, 153, 0.3);
            /* Purple border */
        }

        /* Feedback Snippets Section */
        .feedback-card-title {
            color: var(--purple-accent-light);
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            text-align: center;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid rgba(102, 51, 153, 0.3);
        }

        #feedback-display {
            min-height: 150px;
            /* Ensure space for feedback */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            opacity: 0;
            /* Start hidden for fade-in effect */
            transition: opacity 1s ease-in-out;
            padding: 1rem;
        }

        #feedback-display.fade-in-snippet {
            opacity: 1;
        }

        #feedback-display.fade-out-snippet {
            opacity: 0;
        }

        .feedback-content {
            font-style: italic;
            font-size: 1.1rem;
            color: var(--text-light);
            margin-bottom: 0.75rem;
        }

        .feedback-author {
            font-weight: 600;
            color: var(--purple-accent-light);
            font-size: 0.95rem;
        }

        .feedback-source {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-top: 0.25rem;
        }

        /* Areas for Improvement Card Specific Styles */
        .improvement-card .improvements-list {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }

        /* Make list items more readable and show ranking */
        .improvement-card .improvements-list li {
            background-color: var(--dark-secondary);
            /* Use secondary dark for better contrast */
            border-left: 4px solid var(--orange-warning);
            /* Orange warning accent */
            padding: 0.75rem 1rem;
            margin-bottom: 0.75rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            font-size: 1rem;
            /* Slightly larger font for readability */
            font-weight: 500;
            /* Medium weight */
            color: var(--text-light);
            /* Ensure text is light */
        }

        .improvement-card .improvements-list li:last-child {
            margin-bottom: 0;
        }

        .improvement-card .improvements-list li i {
            color: var(--orange-warning);
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        /* Styling for the ranking number */
        .improvement-card .rank-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 25px;
            /* Fixed width for alignment */
            height: 25px;
            /* Fixed height for alignment */
            background-color: var(--purple-accent-dark);
            /* Dark purple background */
            color: var(--white);
            /* White number */
            border-radius: 50%;
            /* Make it circular */
            font-size: 0.8em;
            /* Slightly smaller than main text */
            font-weight: 700;
            /* Bold */
            margin-right: 0.75rem;
            /* Space before the text */
            flex-shrink: 0;
        }

        /* Styling for the mentions badge */
        .improvement-card .badge {
            background-color: rgba(102, 51, 153, 0.5) !important;
            /* Muted purple for the badge */
            color: var(--purple-accent-light) !important;
            /* Light purple text */
            font-size: 0.75em;
            /* Smaller font size for the badge */
            font-weight: 600;
            padding: 0.3em 0.6em;
            border-radius: 12px;
        }


        /* Bootstrap button override */
        .btn-outline-primary {
            --bs-btn-color: var(--purple-accent-light);
            --bs-btn-border-color: var(--purple-accent-dark);
            --bs-btn-hover-color: var(--white);
            --bs-btn-hover-bg: var(--purple-accent-dark);
            --bs-btn-hover-border-color: var(--purple-accent-dark);
            --bs-btn-focus-shadow-rgb: 102, 51, 153;
            --bs-btn-active-color: var(--white);
            --bs-btn-active-bg: var(--purple-accent-light);
            --bs-btn-active-border-color: var(--purple-accent-light);
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: var(--text-muted);
            --bs-btn-disabled-bg: transparent;
            --bs-btn-disabled-border-color: var(--text-muted);
            --bs-gradient: none;
        }

        .alert-info {
            --bs-alert-bg: var(--dark-secondary);
            --bs-alert-border-color: var(--purple-accent-dark);
            --bs-alert-color: var(--text-light);
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

            .chart-container {
                height: 280px;
                /* Slightly taller on smaller screens for better readability */
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

            /* Adjust list item padding for smaller screens */
            .improvement-card .improvements-list li {
                padding: 0.6rem 0.8rem;
                font-size: 0.9rem;
            }

            .improvement-card .rank-number {
                width: 20px;
                height: 20px;
                font-size: 0.7em;
                margin-right: 0.5rem;
            }
        }

        /* Loading Animation */
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <!-- Sticky Header -->
    <nav class="navbar navbar-dark sticky-top" style="background: linear-gradient(90deg, #1a1a2e 70%, #663399 100%); box-shadow: 0 2px 8px rgba(0,0,0,0.3);">
        <div class="container-fluid">
            <a class="navbar-brand  w-100 d-flex justify-content-center align-items-center gap-2" href="#">
                <img src="{{ asset('images/Component 1.png') }}" alt="Logo" width="40" height="40" class="rounded-circle shadow-sm">
                <span style="font-weight:700; letter-spacing:1px;">RevScrap</span>
            </a>
        </div>
    </nav>
    <!-- End Sticky Header -->

    <div class="hero-banner">
        <div class="hero-content">
            <h1>PORT ROYALE</h1>
            <p style="margin-top: -1rem">Where Luxury Meets Comfort</p>
        </div>
        <div style="position:absolute;bottom:0;left:0;width:100%;height:60px;background:linear-gradient(0deg,rgba(26,26,46,0.95),rgba(26,26,46,0));z-index:1;"></div>
    </div>

    <div class="modal fade" id="summaryModal" tabindex="-1" aria-labelledby="summaryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-black" id="summaryModalLabel">Review Summary</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-black" id="summaryContent">
              Loading summary...
            </div>
          </div>
        </div>
      </div>
      

    <div class="main-container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-4">
                <div class="glass-card avatar-card fade-in">
                    <img src="{{ asset('images/portroyale_avatar.jpg') }}" class="avatar" alt="Resort Manager">

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

                <div class="glass-card stats-card fade-in">
                    <div class="stat-content">
                        <div class="stat-header">
                            <div class="stat-label">Overall Guest Insights</div>
                            <div class="stat-description">
                                Comprehensive statistics based on all available reviews for Port Royale.
                            </div>
                        </div>
                        <div class="row text-center mt-3">
                            <div class="col-6">
                                <div class="stat-value-container">
                                    <div class="stat-value">
                                        <i class="bi bi-star-fill stat-icon"></i>
                                        <span>{{ number_format($averageRating, 1) }}</span>
                                    </div>
                                </div>
                                <div class="stat-label mt-2">Average Rating</div>
                            </div>
                            <div class="col-6">
                                <div class="stat-value-container">
                                    <div class="stat-value">
                                        <i class="bi bi-chat-dots-fill stat-icon"></i>
                                        <span>{{ $totalReviews }}</span>
                                    </div>
                                </div>
                                <div class="stat-label mt-2">Total Reviews</div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="stat-value-container">
                                    <div class="stat-value">
                                        <i class="bi bi-image-fill stat-icon"></i>
                                        <span>{{ $reviewsWithMediaPercentage }}%</span>
                                    </div>
                                </div>
                                <div class="stat-label mt-2">Reviews with Media</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-8">
                <div class="glass-card fade-in">
                    <div class="resort-header">
                        <h2 class="resort-title">Port Royale - Manlurip</h2>
                        <div class="location-badge">
                            <i class="bi bi-geo-alt-fill"></i>
                            Tacloban City, Leyte, Philippines
                        </div>
                    </div>

                    <p class="resort-description">
                        Nestled in the tranquil barangay of Manlurip, Port Royale offers a refreshing escape with its
                        blend of tropical charm and luxurious comfort. Whether you're planning a serene weekend getaway
                        or a private family celebration, Port Royale is the perfect seaside destination.

                        Enjoy scenic views, relaxing sea breezes, and top-tier amenities designed to make your visit
                        unforgettable. Perfect for intimate events, romantic sunsets, or simply soaking in the peaceful
                        coastal vibe.
                    </p>
                </div>

                <div class="glass-card fade-in">
                    <h4 class="feedback-card-title">What Our Guests Are Saying</h4>
                    <div id="feedback-display">
                        <p class="text-muted">Loading feedback...</p>
                    </div>
                </div>

                <div class="glass-card improvement-card fade-in">
                    <h4 class="chart-card-title">Areas for Improvement</h4>
                    <p class="text-light text-white text-center mb-4">Insights derived from negative and mixed feedback
                        to help you enhance guest experience.</p>
                    <ul class="improvements-list">
                        @forelse($topImprovementAreasWithCounts as $area => $count)
                            @if ($area !== 'no specific areas identified yet')
                                {{-- Prevent showing fallback as a ranked item if no actual data --}}
                                <li>
                                    <span class="rank-number">{{ $loop->iteration }}</span> {{-- Ranking number --}}
                                    <i class="bi bi-exclamation-triangle-fill"></i>
                                    {{ ucfirst($area) }} <span class="badge bg-secondary ms-2">{{ $count }}
                                        mentions</span>
                                </li>
                            @else
                                <li><i class="bi bi-info-circle-fill"></i> No specific improvement areas identified from
                                    recent feedback.</li>
                                <li><i class="bi bi-check-circle-fill"></i> Keep up the great work!</li>
                            @endif
                        @empty
                            {{-- This @empty block will technically not be hit if we send a dummy value,
                                 but it's good practice to keep it for robustness.
                                 The @if condition above handles the 'no data' case for the list items. --}}
                            <li><i class="bi bi-info-circle-fill"></i> No specific improvement areas identified from
                                recent feedback.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Keep up the great work!</li>
                        @endforelse
                    </ul>
                </div>

            </div>

            <div class="col-lg-3 col-md-12">
                <div class="glass-card fade-in">
                    <div class="d-flex justify-content-between align-items-center reviews-header">
                        <h3 class="m-0">Guest Reviews</h3>
                        <button class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1" id="summarizeBtn">
                            <i class="bi bi-stars"></i>
                            <span>Summarize</span>
                        </button>
                    </div>
                    

                    {{-- WRAPPER DIV for scrollable reviews --}}
                    <div id="reviews-scroll-container">
                        @forelse($allReviews as $review)
                            <div class="review-card">
                                @if ($review->rating)
                                    <div class="stars">
                                        {{ $review->stars }}
                                        <span class="badge 
                                            @if($review->sentiment == 'positive') bg-success
                                            @elseif($review->sentiment == 'negative') bg-danger
                                            @else bg-secondary
                                            @endif">
                                            {{ ucfirst($review->sentiment) }}
                                        </span>
                                    </div>
                                @endif
                                <p class="review-text">"{{ $review->review_content }}"</p>
                                <div class="reviewer-info">
                                    <div class="reviewer-name">{{ $review->reviewer_name ?? 'Anonymous' }}</div>
                                    <div>{{ \Carbon\Carbon::parse($review->review_date)->format('F Y') }}</div>
                                    @if ($review->source_platform)
                                        <div>Source: {{ $review->source_platform }}</div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info" role="alert" id="no-reviews-message">
                                No reviews available yet for Port Royale.
                            </div>
                        @endforelse
                    </div> {{-- END of #reviews-scroll-container --}}
                </div>
            </div>
        </div>

        <div class="row g-4 mt-4">
            <h3 class="chart-section-title">Detailed Review Analytics</h3>
            <div class="col-lg-6 col-md-12">
                <div class="glass-card fade-in">
                    <h4 class="chart-card-title">Review Distribution</h4>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <h5 class="text-center mb-3">Rating Breakdown</h5>
                            <div class="chart-container">
                                <canvas id="ratingDistributionChart"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5 class="text-center mb-3">Reviews by Source</h5>
                            <div class="chart-container">
                                <canvas id="platformDistributionChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="glass-card fade-in">
                    <h4 class="chart-card-title">Sentiment & Trend Analysis</h4>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <h5 class="text-center mb-3">Sentiment Breakdown</h5>
                            <div class="chart-container">
                                <canvas id="sentimentDistributionChart"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5 class="text-center mb-3">Reviews Over Time</h5>
                            <div class="chart-container">
                                <canvas id="reviewsOverTimeChart"></canvas>
                            </div>
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

            // --- Chart Initialization ---
            // Data passed from Laravel
            const ratingDistributionData = @json($fullRatingDistribution);
            const platformDistributionData = @json($reviewsByPlatform);
            const sentimentDistributionData = @json($fullSentimentDistribution);
            const reviewsOverTimeData = @json($reviewsOverTime);

            // Chart Colors
            const primaryColor = '#e0b0ff'; // Light purple for bars/lines
            const secondaryColor = '#663399'; // Darker purple
            const successColor = '#00b894'; // For positive sentiment
            const warningColor = '#ffbe76'; // For mixed sentiment
            const dangerColor = '#ff6b6b'; // For negative sentiment
            const infoColor = '#48dbfb'; // For neutral sentiment

            const backgroundColors = [
                primaryColor, secondaryColor, successColor, warningColor, dangerColor, infoColor,
                '#a29bfe', '#fd79a8', '#ffeaa7', '#55efc4', '#81ecec', '#74b9ff'
            ];

            // Helper function to get computed style for CSS variables
            function getCssVariable(variableName) {
                return getComputedStyle(document.documentElement).getPropertyValue(variableName).trim();
            }

            // Get colors from CSS variables
            const chartTextColorLight = getCssVariable('--text-light');
            const chartTextColorMuted = getCssVariable('--text-muted');
            const chartGridColor = 'rgba(255, 255, 255, 0.1)'; // Fixed translucent white for grid lines

            // 1. Rating Distribution Chart (Bar Chart)
            const ratingCtx = document.getElementById('ratingDistributionChart').getContext('2d');
            new Chart(ratingCtx, {
                type: 'bar',
                data: {
                    labels: Object.keys(ratingDistributionData),
                    datasets: [{
                        label: 'Number of Reviews',
                        data: Object.values(ratingDistributionData),
                        backgroundColor: primaryColor, // Consistent color for bars
                        borderColor: primaryColor,
                        borderWidth: 1,
                        borderRadius: 5,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: false,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: chartGridColor,
                                drawBorder: false
                            },
                            ticks: {
                                color: chartTextColorMuted
                            }
                        },
                        x: {
                            grid: {
                                color: chartGridColor,
                                drawBorder: false
                            },
                            ticks: {
                                color: chartTextColorMuted
                            }
                        }
                    }
                }
            });

            // 2. Reviews by Source Platform Chart (Doughnut Chart)
            const platformCtx = document.getElementById('platformDistributionChart').getContext('2d');
            new Chart(platformCtx, {
                type: 'doughnut',
                data: {
                    labels: Object.keys(platformDistributionData),
                    datasets: [{
                        data: Object.values(platformDistributionData),
                        backgroundColor: backgroundColors.slice(0, Object.keys(
                            platformDistributionData).length),
                        borderColor: getCssVariable('--dark-secondary'), // Border around segments
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                color: chartTextColorLight
                            }
                        },
                        title: {
                            display: false
                        }
                    }
                }
            });

            // 3. Reviews by Sentiment Chart (Pie Chart)
            const sentimentCtx = document.getElementById('sentimentDistributionChart').getContext('2d');
            new Chart(sentimentCtx, {
                type: 'pie',
                data: {
                    labels: Object.keys(sentimentDistributionData).map(label => ucfirst(label)),
                    datasets: [{
                        data: Object.values(sentimentDistributionData),
                        backgroundColor: [
                            successColor, // Positive
                            infoColor, // Neutral
                            dangerColor, // Negative
                            warningColor // Mixed
                        ],
                        borderColor: getCssVariable('--dark-secondary'),
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                color: chartTextColorLight
                            }
                        },
                        title: {
                            display: false
                        }
                    }
                }
            });

            // 4. Reviews Over Time Chart (Line Chart)
            const reviewsOverTimeCtx = document.getElementById('reviewsOverTimeChart').getContext('2d');
            new Chart(reviewsOverTimeCtx, {
                type: 'line',
                data: {
                    labels: Object.keys(reviewsOverTimeData),
                    datasets: [{
                        label: 'Number of Reviews',
                        data: Object.values(reviewsOverTimeData),
                        borderColor: primaryColor,
                        backgroundColor: 'rgba(102, 51, 153, 0.2)', // Light fill
                        fill: true,
                        tension: 0.3, // Smooth curves
                        pointBackgroundColor: primaryColor,
                        pointBorderColor: primaryColor
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: chartGridColor,
                                drawBorder: false
                            },
                            ticks: {
                                color: chartTextColorMuted
                            }
                        },
                        x: {
                            grid: {
                                color: chartGridColor,
                                drawBorder: false
                            },
                            ticks: {
                                color: chartTextColorMuted
                            }
                        }
                    }
                }
            });


            // Function to capitalize first letter
            function ucfirst(str) {
                if (!str) return str;
                return str.charAt(0).toUpperCase() + str.slice(1);
            }


            // --- Feedback Snippets Cycling ---
            const allReviewsData = @json($allReviews->toArray()); // Convert collection to array
            const feedbackDisplay = document.getElementById('feedback-display');
            let currentSnippetIndex = 0;

            function updateFeedbackSnippet() {
                if (allReviewsData.length === 0) {
                    feedbackDisplay.innerHTML = '<p class="text-muted">No reviews available yet.</p>';
                    return;
                }

                feedbackDisplay.classList.remove('fade-in-snippet');
                feedbackDisplay.classList.add('fade-out-snippet');

                setTimeout(() => {
                    const review = allReviewsData[currentSnippetIndex];
                    const reviewerName = review.reviewer_name || 'Anonymous';
                    const reviewDate = new Date(review.review_date).toLocaleString('en-US', {
                        month: 'long',
                        year: 'numeric'
                    });
                    const sourcePlatform = review.source_platform ? `(via ${review.source_platform})` : '';

                    feedbackDisplay.innerHTML = `
                        <p class="feedback-content">"${review.review_content}"</p>
                        <p class="feedback-author">${reviewerName}</p>
                        <p class="feedback-source">${reviewDate} ${sourcePlatform}</p>
                    `;
                    feedbackDisplay.classList.remove('fade-out-snippet');
                    feedbackDisplay.classList.add('fade-in-snippet');

                    currentSnippetIndex = (currentSnippetIndex + 1) % allReviewsData.length;
                }, 1000); // Wait for fade-out to complete before changing content
            }

            // Update every 7 seconds
            setInterval(updateFeedbackSnippet, 7000);
            updateFeedbackSnippet(); 
        });
    </script>

<script>
    document.getElementById("summarizeBtn").addEventListener("click", function () {
        const modal = new bootstrap.Modal(document.getElementById("summaryModal"));
        modal.show();
    
        // Show loading text
        document.getElementById("summaryContent").innerHTML = "<p>Loading summary...</p>";
    
        fetch("{{ route('summarize.reviews') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if (data.summary && data.summary.content) {
                const summaryText = data.summary.content;
    
                // Split into sentences or lines, adjust as needed
                const bulletPoints = summaryText
                    .split(/[.?!]\s+/)  // Split by sentence ending
                    .filter(point => point.trim().length > 0);
    
                // Create bullet list
                const ul = document.createElement("ul");
                bulletPoints.forEach(point => {
                    const li = document.createElement("li");
                    li.textContent = point.trim();
                    ul.appendChild(li);
                });
    
                // Replace content
                const contentDiv = document.getElementById("summaryContent");
                contentDiv.innerHTML = "";
                contentDiv.appendChild(ul);
            } else {
                document.getElementById("summaryContent").textContent = "Failed to get summary.";
            }
        })
        .catch(err => {
            console.error(err);
            document.getElementById("summaryContent").textContent = "Error loading summary.";
        });
    });
    </script>
    
</body>

</html>
