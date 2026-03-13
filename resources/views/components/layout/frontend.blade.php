<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mediverse - Smart Healthcare</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background: #f8fafc;
            overflow-x: hidden;
        }

        /* floating blobs */

        .blob {
            position: absolute;
            border-radius: 9999px;
            filter: blur(90px);
            opacity: .35;
            animation: float 10s infinite ease-in-out;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-40px)
            }
        }

        /* card 3D hover */

        .card3d {
            transform-style: preserve-3d;
            transition: transform .4s;
        }

        .card3d:hover {
            transform: rotateX(8deg) rotateY(-8deg) scale(1.05);
        }

        /* glass */

        .glass {
            backdrop-filter: blur(18px);
            background: rgba(255, 255, 255, 0.6);
        }

        /* subtle card depth */

        .depth {
            box-shadow:
                0 10px 25px rgba(0, 0, 0, .08),
                0 20px 60px rgba(0, 0, 0, .08);
        }
    </style>

</head>

<body class="text-gray-800">

    <!-- decorative gradients -->

    <div class="blob w-96 h-96 bg-emerald-400 top-20 left-10"></div>
    <div class="blob w-96 h-96 bg-green-300 bottom-10 right-10"></div>

    <x-frontend.navbar />

    {{ $slot }}

    <x-frontend.footer />

</body>

</html>
