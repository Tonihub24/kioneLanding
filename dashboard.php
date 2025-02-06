<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- External CSS -->
    <style>
        /* Metal Background */
        body {
            --metal-tex: url(https://images.unsplash.com/photo-1501166222995-ff31c7e93cef?crop=entropy&cs=tinysrgb&fm=jpg&ixid=MnwzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2NTcyMDc2NzU&ixlib=rb-1.2.1&q=80);
            background: black;
            color: white;
            font-family: system-ui, sans-serif;
        }

        a {
            color: skyblue;
            font-weight: bold;
        }

        .main {
            margin: 40px auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .metal {
            position: relative;
            margin: 10vh auto;
            color: transparent;
            font-family: impact, sans-serif;
            font-size: 9vw;
            letter-spacing: 0.05em;
            background-image: var(--metal-tex);
            background-size: cover;
            background-clip: text;
            -webkit-background-clip: text;
        }

        .texture,
        .texture::after {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
        }

        .texture {
            background-image: linear-gradient(to bottom, blue, white 50%, red 65%, white);
            background-attachment: fixed;
            mix-blend-mode: color-dodge;
        }

        .texture::after {
            content: '';
            background-image: var(--metal-tex);
            background-size: cover;
            filter: saturate(0) brightness(0.8) contrast(4);
            mix-blend-mode: multiply;
        }

        /* Overlay */
        .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 85%;
            height: 30vh;
            z-index: 100;
            background: linear-gradient(
                0deg,
                rgba(255, 255, 255, 1) 75%,
                rgba(255, 255, 255, 0.9) 80%,
                rgba(255, 255, 255, 0.25) 95%,
                rgba(255, 255, 255, 0) 100%
            );
        }

        /* Animated Text */
        .text {
            font-family: "Yanone Kaffeesatz";
            font-size: 40px;
            display: flex;
            position: absolute;
            bottom: 25vh;
            left: 40%;
            transform: translateX(-50%);
            user-select: none;
        }

        .wrapper {
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 20px;
        }

        .letter {
            transition: ease-out 1s;
            transform: translateY(40%);
        }

        .shadow {
            transform: scale(1, -1);
            color: #999;
            transition: ease-in 5s, ease-out 5s;
        }

        .wrapper:hover .letter {
            transform: translateY(-200%);
        }

        .wrapper:hover .shadow {
            opacity: 0;
            transform: translateY(200%);
        }

        /* Motto */
        .motto {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 20px;
            color: #fff;
        }

        /* Right Navigation Bar */
        .right-nav {
            position: fixed;
            right: 0;
            top: 0;
            width: 250px;
            height: 100%;
            background-color: #222;
            padding: 20px;
        }

        .divider {
            border-bottom: 1px solid #fff;
            margin-bottom: 10px;
        }

        .nav-button {
            padding: 10px;
            color: #fff;
            cursor: pointer;
        }

        .nav-button:hover {
            background-color: #444;
        }

        .nav-toggle {
            display: none;
        }
    </style>
</head>
<body>

    <!-- HEADER WITH METAL TEXT EFFECT -->
    <div class="main">
        <h1 class="metal">
            RUNTIMESHOP.COM
            <span class="texture"></span>   
        </h1>
    </div>
    
    <!-- Animated Text -->
    <div class="overlay"></div>
    <div class="text">
        <!-- Deploy Section -->
        <div class="wrapper">
            <div id="D" class="letter">D</div>
            <div class="shadow">D</div>
        </div>
        <div class="wrapper">
            <div id="E" class="letter">E</div>
            <div class="shadow">E</div>
        </div>
        <div class="wrapper">
            <div id="P" class="letter">P</div>
            <div class="shadow">P</div>
        </div>
        <div class="wrapper">
            <div id="L" class="letter">L</div>
            <div class="shadow">L</div>
        </div>
        <div class="wrapper">
            <div id="O" class="letter">O</div>
            <div class="shadow">O</div>
        </div>
        <div class="wrapper">
            <div id="Y" class="letter">Y</div>
            <div class="shadow">Y</div>
        </div>

        <!-- Secure Section -->
        <div class="wrapper">
            <div id="S" class="letter">S</div>
            <div class="shadow">S</div>
        </div>
        <div class="wrapper">
            <div id="E2" class="letter">E</div>
            <div class="shadow">E</div>
        </div>
        <div class="wrapper">
            <div id="C" class="letter">C</div>
            <div class="shadow">C</div>
        </div>
        <div class="wrapper">
            <div id="U" class="letter">U</div>
            <div class="shadow">U</div>
        </div>
        <div class="wrapper">
            <div id="R" class="letter">R</div>
            <div class="shadow">R</div>
        </div>
        <div class="wrapper">
            <div id="E3" class="letter">E</div>
            <div class="shadow">E</div>
        </div>

        <!-- Growth Section -->
        <div class="wrapper">
            <div id="G" class="letter">G</div>
            <div class="shadow">G</div>
        </div>
        <div class="wrapper">
            <div id="R2" class="letter">R</div>
            <div class="shadow">R</div>
        </div>
        <div class="wrapper">
            <div id="O2" class="letter">O</div>
            <div class="shadow">O</div>
        </div>
        <div class="wrapper">
            <div id="W" class="letter">W</div>
            <div class="shadow">W</div>
        </div>
        <div class="wrapper">
            <div id="T" class="letter">T</div>
            <div class="shadow">T</div>
        </div>
        <div class="wrapper">
            <div id="H" class="letter">H</div>
            <div class="shadow">H</div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>www.TheRuntimeShop.com</p>
        <p><a href="mailto:admin@theruntimeshop.com">Hire a Developer</a></p>
    </footer>

    <!-- Right Navigation Bar -->
    <div class="right-nav">
        <input type="checkbox" id="nav-toggle">
        <div class="right-nav">
    <!-- Welcome message and divider -->
    <div class="divider"></div>
    <p>Welcome, greatday! to your</p>

	<div id="nav-header">
            <a id="nav-title" href="https://codepen.io" target="_blank">
                <i class="fab fa-codepen"></i> DASHBOARD
            </a>
            <label for="nav-toggle">
                <span id="nav-toggle-burger"></span>
            </label>
            <hr>
        </div>
        <div id="nav-content">
            <div class="nav-button"><i class="fas fa-palette"></i><span>Deploys</span></div>
            <div class="nav-button"><i class="fas fa-images"></i><span>Web Security</span></div>
            <div class="nav-button"><i class="fas fa-heart"></i><span>DevService</span></div>
            <hr>
            <div class="nav-button"><i class="fas fa-chart-line"></i><span>Trending</span></div>
            <div class="nav-button"><i class="fas fa-fire"></i><span>Shop RuntimeShop</span></div>
            <div class="nav-button"><i class="fas fa-magic"></i><span>Follow us</span></div>
            <hr>
            <!-- RuntimeShop Members Pro link -->
    <div class="nav-button">
        <i class="fas fa-gem"></i>
        <span><a href="runtimeshoppro.php" style="color: inherit; text-decoration: none;">RuntimeShop Members Pro</a></span>
        </div>
<!-- PayPal Donation Button -->
<div class="nav-button">
    <form action="https://www.paypal.com/donate" method="post" target="_top">
        <input type="hidden" name="business" value="TDNVX8M5ETASN">
        <input type="hidden" name="no_recurring" value="0">
        <input type="hidden" name="item_name" value="Thank you for helping a community of programmers with dreams">
        <input type="hidden" name="currency_code" value="USD">
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button">
        <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>
	
    </div>


</html>
