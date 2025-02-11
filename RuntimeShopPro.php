<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RuntimeShop Pro</title>
    <style>
        /* Metal Background */
        body {
            --metal-tex: url(https://images.unsplash.com/photo-1501166222995-ff31c7e93cef?crop=entropy&cs=tinysrgb&fm=jpg&ixid=MnwzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2NTcyMDc2NzU&ixlib=rb-1.2.1&q=80);
            background: black;
            color: white;
            font-family: system-ui, sans-serif;
            margin: 0;
            padding: 0;
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
            font-size: 5vw;
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

        /* Sticky Header */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            text-align: center;
            background: black;
            padding: 15px 0;
            z-index: 1000;
        }

        /* Page Content */
        .content {
            margin-top: 100px; /* Adjust for fixed header */
            padding: 20px;
            text-align: center;
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
    </style>
</head>
<body>

    <!-- Sticky Header with Metal Text -->
    <div class="header">
        <h1 class="metal">RUNTIMESHOP PRO<span class="texture"></span></h1>
 <p>Welcome to TheRuntimeShop.com Pro </p>
    </div>

   



</body>
</html>
