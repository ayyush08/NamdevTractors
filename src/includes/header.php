<!-- header.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TractorTrove</title>
    <link rel="stylesheet" href="output.css">
    <style>
        .sticky-nav {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(29, 78, 216, 0.9);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="bg-transparent h-[120vh]">
    <nav class="sticky-nav flex justify-between items-center p-5 shadow-lg">
        <h1 class="text-3xl font-extrabold text-white">TractorTrove</h1>
        <ul class="flex gap-6 font-semibold text-white text-xl px-6">
            <!-- Home Tab -->
            <li class="hover:text-gray-300 cursor-pointer transition-all duration-300">
                <a href="#home">Home</a>
            </li>
            <!-- Explore Tractors Tab -->
            <li class="hover:text-gray-300 cursor-pointer transition-all duration-300">
                <a href="#features">Explore Tractors</a>
            </li>
            <!-- About Us Tab -->
            <li class="hover:text-gray-300 cursor-pointer transition-all duration-300">
                <a href="#about">About Us</a>
            </li>
            <!-- Contact Us Tab -->
            <li class="hover:text-gray-300 cursor-pointer transition-all duration-300">
                <a href="#contact">Contact Us</a>
            </li>
        </ul>
    </nav>
