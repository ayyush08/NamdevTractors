<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TractorLand - Premium Agricultural Equipment</title>
    <meta name="description"
        content="Discover our exceptional range of high-performance tractors designed to elevate your agricultural productivity." />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        tractor: {
                            '50': '#f2f8ef',
                            '100': '#e0efda',
                            '200': '#c3e0b9',
                            '300': '#9bcb8e',
                            '400': '#71b061',
                            '500': '#539443',
                            '600': '#3d7632',
                            '700': '#305e2a',
                            '800': '#294b25',
                            '900': '#244021',
                            '950': '#0f2310',
                        },
                    },
                    keyframes: {
                        'fade-in': {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(10px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        'float': {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            }
                        }
                    },
                    animation: {
                        'fade-in': 'fade-in 0.5s ease-out',
                        'float': 'float 3s ease-in-out infinite'
                    }
                }
            }
        }
    </script>

    <!-- Custom CSS -->
    <style>
        .heading-highlight {
            position: relative;
            display: inline-block;
        }

        .heading-highlight::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: #539443;
            margin-bottom: -8px;
        }

        .btn-primary {
            background-color: #3d7632;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: background-color 150ms;
        }

        .btn-primary:hover {
            background-color: #305e2a;
        }

        .btn-secondary {
            background-color: white;
            color: #3d7632;
            border: 1px solid #3d7632;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: background-color 150ms;
        }

        .btn-secondary:hover {
            background-color: #f3f4f6;
        }
    </style>
</head>

<body class="bg-white text-gray-900">
    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-sm shadow-sm">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <span class="text-2xl font-bold text-tractor-600">TractorLand</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-700 hover:text-tractor-600 font-medium transition-colors">Home</a>
                    <a href="#products"
                        class="text-gray-700 hover:text-tractor-600 font-medium transition-colors">Products</a>
                    <a href="#features"
                        class="text-gray-700 hover:text-tractor-600 font-medium transition-colors">Features</a>
                    <a href="#testimonials"
                        class="text-gray-700 hover:text-tractor-600 font-medium transition-colors">Testimonials</a>
                    <a href="#contact"
                        class="text-gray-700 hover:text-tractor-600 font-medium transition-colors">Contact</a>
                </div>

                <!-- Mobile Navigation Button -->
                <div class="md:hidden">
                    <button type="button" class="text-gray-700 hover:text-tractor-600 focus:outline-none"
                        id="menu-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="menu-icon">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="x-icon hidden">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu"
            class="fixed inset-0 z-50 bg-white pt-20 px-4 md:hidden transform transition-transform duration-300 ease-in-out translate-x-full">
            <div class="flex flex-col space-y-6 text-center">
                <a href="#" class="text-gray-700 hover:text-tractor-600 text-xl font-medium block py-2"
                    onclick="toggleMobileMenu()">Home</a>
                <a href="#products" class="text-gray-700 hover:text-tractor-600 text-xl font-medium block py-2"
                    onclick="toggleMobileMenu()">Products</a>
                <a href="#features" class="text-gray-700 hover:text-tractor-600 text-xl font-medium block py-2"
                    onclick="toggleMobileMenu()">Features</a>
                <a href="#testimonials" class="text-gray-700 hover:text-tractor-600 text-xl font-medium block py-2"
                    onclick="toggleMobileMenu()">Testimonials</a>
                <a href="#contact" class="text-gray-700 hover:text-tractor-600 text-xl font-medium block py-2"
                    onclick="toggleMobileMenu()">Contact</a>
            </div>
        </div>
    </nav>

    <main>
        <!-- Hero Section -->
        <section class="relative overflow-hidden bg-gradient-to-b from-tractor-50 to-white py-16 md:py-24">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6 animate-fade-in">
                        <div>
                            <span
                                class="inline-block px-3 py-1 bg-tractor-100 text-tractor-700 rounded-full text-sm font-medium mb-4">
                                Premium Tractors
                            </span>
                        </div>
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                            Powerful Machines for Modern <span class="heading-highlight">Farming</span>
                        </h1>
                        <p class="text-xl text-gray-600 max-w-lg">
                            Discover our exceptional range of high-performance tractors designed to elevate your
                            agricultural productivity.
                        </p>
                        <div class="flex flex-wrap gap-4 pt-2">
                            <a href="#products" class="btn-primary flex items-center gap-2">
                                Explore Models
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </a>
                            <a href="#contact" class="btn-secondary">
                                Contact Us
                            </a>
                        </div>
                    </div>

                    <div class="relative h-[300px] md:h-[450px] lg:h-[500px] animate-fade-in"
                        style="animation-delay: 0.2s">
                        <div
                            class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1605002716311-b8f4f08abf74?ixlib=rb-4.0.3')] bg-cover bg-center rounded-lg shadow-xl transform hover:scale-[1.02] transition-transform duration-300">
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white to-transparent"></div>
        </section>

        <!-- Product Showcase -->
        <section id="products" class="py-16 md:py-24 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span
                        class="inline-block px-3 py-1 bg-tractor-100 text-tractor-700 rounded-full text-sm font-medium mb-4">
                        Our Tractors
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Featured Models
                    </h2>
                    <p class="text-lg text-gray-600">
                        Explore our diverse range of tractors designed to meet all your agricultural needs. From compact
                        models to powerful workhorses.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="relative h-[400px] md:h-[500px] rounded-lg overflow-hidden shadow-xl">
                        <img id="product-image"
                            src="https://images.unsplash.com/photo-1598281003863-e12c6e30d510?ixlib=rb-4.0.3"
                            alt="AgriMax Pro X750" class="w-full h-full object-cover" />
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                            <h3 id="product-name" class="text-2xl font-bold text-white mb-2">AgriMax Pro X750</h3>
                            <p id="product-specs" class="text-white/90 mb-1">75 HP | Heavy Duty</p>
                            <p id="product-price" class="text-tractor-400 font-medium">Starting at $65,000</p>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <div>
                            <h3 id="product-title" class="text-2xl font-bold text-gray-900 mb-4">AgriMax Pro X750</h3>
                            <p id="product-description" class="text-gray-600 mb-6">Perfect for extensive farming
                                operations, featuring advanced hydraulics system.</p>
                            <a href="#contact" class="btn-primary inline-block">Request Quote</a>
                        </div>

                        <div class="space-y-4">
                            <h4 class="text-lg font-semibold text-gray-900">Browse Models</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <button
                                    class="product-btn p-4 rounded-lg border transition-all border-tractor-600 bg-tractor-50"
                                    data-id="1" data-name="AgriMax Pro X750" data-category="Heavy Duty"
                                    data-power="75 HP"
                                    data-image="https://images.unsplash.com/photo-1598281003863-e12c6e30d510?ixlib=rb-4.0.3"
                                    data-description="Perfect for extensive farming operations, featuring advanced hydraulics system."
                                    data-price="Starting at $65,000">
                                    <h5 class="font-medium">AgriMax Pro X750</h5>
                                    <p class="text-sm text-gray-500">75 HP</p>
                                </button>
                                <button
                                    class="product-btn p-4 rounded-lg border transition-all border-gray-200 hover:border-tractor-300"
                                    data-id="2" data-name="AgriMax Compact C320" data-category="Compact"
                                    data-power="32 HP"
                                    data-image="https://images.unsplash.com/photo-1587129472816-74735d7a1b3a?ixlib=rb-4.0.3"
                                    data-description="Ideal for small farms and specialized applications, with optimal maneuverability."
                                    data-price="Starting at $28,500">
                                    <h5 class="font-medium">AgriMax Compact C320</h5>
                                    <p class="text-sm text-gray-500">32 HP</p>
                                </button>
                                <button
                                    class="product-btn p-4 rounded-lg border transition-all border-gray-200 hover:border-tractor-300"
                                    data-id="3" data-name="AgriMax Utility U500" data-category="Utility"
                                    data-power="50 HP"
                                    data-image="https://images.unsplash.com/photo-1624061259218-6e0d47b8d96b?ixlib=rb-4.0.3"
                                    data-description="Versatile and reliable, designed for medium-sized agricultural operations."
                                    data-price="Starting at $42,000">
                                    <h5 class="font-medium">AgriMax Utility U500</h5>
                                    <p class="text-sm text-gray-500">50 HP</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-16 md:py-24 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span
                        class="inline-block px-3 py-1 bg-tractor-100 text-tractor-700 rounded-full text-sm font-medium mb-4">
                        Why Choose Us
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Industry-Leading Features
                    </h2>
                    <p class="text-lg text-gray-600">
                        Our tractors are designed with cutting-edge technology and superior craftsmanship to ensure
                        maximum performance and durability.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="p-6 rounded-xl bg-white shadow-md hover:shadow-lg transition-shadow">
                        <div
                            class="inline-flex items-center justify-center h-12 w-12 rounded-lg bg-tractor-100 text-tractor-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.6-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2">
                                </path>
                                <circle cx="7" cy="17" r="2"></circle>
                                <path d="M9 17h6"></path>
                                <circle cx="17" cy="17" r="2"></circle>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Advanced Technology</h3>
                        <p class="text-gray-600">Equipped with the latest innovations for improved performance and fuel
                            efficiency.</p>
                    </div>
                    <div class="p-6 rounded-xl bg-white shadow-md hover:shadow-lg transition-shadow">
                        <div
                            class="inline-flex items-center justify-center h-12 w-12 rounded-lg bg-tractor-100 text-tractor-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Superior Build Quality</h3>
                        <p class="text-gray-600">Manufactured with premium materials to ensure longevity and
                            reliability.</p>
                    </div>
                    <div class="p-6 rounded-xl bg-white shadow-md hover:shadow-lg transition-shadow">
                        <div
                            class="inline-flex items-center justify-center h-12 w-12 rounded-lg bg-tractor-100 text-tractor-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M14 6l-4.5 4.5"></path>
                                <path
                                    d="m18.5 14.5-.96.96a2.23 2.23 0 0 1-3.12 0l-2.76-2.76a2.23 2.23 0 0 1 0-3.12l.96-.96">
                                </path>
                                <path
                                    d="M8 16l-1.17 1.17a3.33 3.33 0 0 1-4.7 0 3.33 3.33 0 0 1 0-4.7L14.3 0.3a1 1 0 0 1 1.4 0l8 8a1 1 0 0 1 0 1.4l-12.3 12.3a3.33 3.33 0 0 1-4.7 0 3.33 3.33 0 0 1 0-4.7L8 16z">
                                </path>
                                <path d="M4.5 19.5 15 9"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Easy Maintenance</h3>
                        <p class="text-gray-600">Designed for simple servicing with readily available parts and support.
                        </p>
                    </div>
                    <div class="p-6 rounded-xl bg-white shadow-md hover:shadow-lg transition-shadow">
                        <div
                            class="inline-flex items-center justify-center h-12 w-12 rounded-lg bg-tractor-100 text-tractor-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Expert Support</h3>
                        <p class="text-gray-600">Our team of specialists provides dedicated assistance and technical
                            guidance.</p>
                    </div>
                </div>

                <div class="mt-16 bg-tractor-600 rounded-xl p-8 md:p-12 text-white">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
                        <div class="lg:col-span-2">
                            <h3 class="text-2xl md:text-3xl font-bold mb-4">Ready to upgrade your farming equipment?
                            </h3>
                            <p class="text-white/90 mb-6 lg:mb-0">
                                Our experts are ready to help you find the perfect tractor for your agricultural needs.
                            </p>
                        </div>
                        <div class="flex justify-center lg:justify-end">
                            <a href="#contact" class="btn-secondary bg-white text-tractor-600 hover:bg-gray-100">
                                Get in Touch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="py-16 md:py-24 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span
                        class="inline-block px-3 py-1 bg-tractor-100 text-tractor-700 rounded-full text-sm font-medium mb-4">
                        Customer Stories
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        What Our Customers Say
                    </h2>
                    <p class="text-lg text-gray-600">
                        Hear from farmers and agricultural professionals who have experienced the TractorLand
                        difference.
                    </p>
                </div>

                <div class="max-w-4xl mx-auto">
                    <div class="bg-gray-50 rounded-2xl p-6 md:p-10 shadow-lg">
                        <div class="flex flex-col md:flex-row gap-6 md:gap-10 items-center">
                            <div
                                class="w-24 h-24 md:w-32 md:h-32 rounded-full overflow-hidden flex-shrink-0 border-4 border-white shadow-md">
                                <img id="testimonial-image"
                                    src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3"
                                    alt="Michael Johnson" class="w-full h-full object-cover" />
                            </div>
                            <div>
                                <blockquote id="testimonial-quote" class="text-lg md:text-xl text-gray-700 italic mb-6">
                                    "The AgriMax Pro X750 has transformed our operation. We've seen a 30% increase in
                                    efficiency since making the switch. The power and reliability are unmatched."
                                </blockquote>
                                <div>
                                    <p id="testimonial-name" class="font-semibold text-gray-900">Michael Johnson</p>
                                    <p id="testimonial-role" class="text-gray-600">Farm Owner, Green Valley Farms</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center mt-8 space-x-2">
                        <button data-index="0"
                            class="testimonial-dot w-6 h-3 rounded-full bg-tractor-600 transition-all duration-300"
                            aria-label="View testimonial 1"></button>
                        <button data-index="1"
                            class="testimonial-dot w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 transition-all duration-300"
                            aria-label="View testimonial 2"></button>
                        <button data-index="2"
                            class="testimonial-dot w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 transition-all duration-300"
                            aria-label="View testimonial 3"></button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-16 md:py-24 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <div>
                        <span
                            class="inline-block px-3 py-1 bg-tractor-100 text-tractor-700 rounded-full text-sm font-medium mb-4">
                            Get In Touch
                        </span>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                            Contact Us Today
                        </h2>
                        <p class="text-lg text-gray-600 mb-8">
                            Have questions about our tractors or want to schedule a demonstration?
                            Our team is ready to assist you with all your agricultural equipment needs.
                        </p>

                        <div class="space-y-6">
                            <div class="flex gap-4 items-start">
                                <div
                                    class="flex-shrink-0 h-10 w-10 rounded-full bg-tractor-100 flex items-center justify-center text-tractor-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-900">Phone</h4>
                                    <p class="text-gray-600">+1 (555) 123-4567</p>
                                </div>
                            </div>
                            <div class="flex gap-4 items-start">
                                <div
                                    class="flex-shrink-0 h-10 w-10 rounded-full bg-tractor-100 flex items-center justify-center text-tractor-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-900">Email</h4>
                                    <p class="text-gray-600">info@tractorland.com</p>
                                </div>
                            </div>
                            <div class="flex gap-4 items-start">
                                <div
                                    class="flex-shrink-0 h-10 w-10 rounded-full bg-tractor-100 flex items-center justify-center text-tractor-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-900">Address</h4>
                                    <p class="text-gray-600">1234 Farming Road, Agricultural District, CA 95825</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Send us a message</h3>
                        <form id="contact-form" class="space-y-5">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                                <input type="text" id="name" name="name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-tractor-500 focus:border-transparent"
                                    required />
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" id="email" name="email"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-tractor-500 focus:border-transparent"
                                    required />
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                                <input type="tel" id="phone" name="phone"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-tractor-500 focus:border-transparent" />
                            </div>

                            <div>
                                <label for="message"
                                    class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                                <textarea id="message" name="message" rows="4"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-tractor-500 focus:border-transparent"
                                    required></textarea>
                            </div>

                            <button type="submit" id="submit-btn"
                                class="w-full btn-primary flex justify-center items-center">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="text-tractor-400">
                            <path
                                d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.6-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2">
                            </path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <path d="M9 17h6"></path>
                            <circle cx="17" cy="17" r="2"></circle>
                        </svg>
                        <span class="text-2xl font-bold">TractorLand</span>
                    </div>
                    <p class="text-gray-400 mb-4">
                        Providing premium agricultural equipment and exceptional service since 1995.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors" aria-label="Facebook">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors" aria-label="Instagram">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors" aria-label="Twitter">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors" aria-label="YouTube">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Products</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#products" class="text-gray-400 hover:text-white transition-colors">
                                Compact Tractors
                            </a>
                        </li>
                        <li>
                            <a href="#products" class="text-gray-400 hover:text-white transition-colors">
                                Utility Tractors
                            </a>
                        </li>
                        <li>
                            <a href="#products" class="text-gray-400 hover:text-white transition-colors">
                                Heavy Duty Tractors
                            </a>
                        </li>
                        <li>
                            <a href="#products" class="text-gray-400 hover:text-white transition-colors">
                                Special Applications
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Services</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#contact" class="text-gray-400 hover:text-white transition-colors">
                                Maintenance
                            </a>
                        </li>
                        <li>
                            <a href="#contact" class="text-gray-400 hover:text-white transition-colors">
                                Repairs
                            </a>
                        </li>
                        <li>
                            <a href="#contact" class="text-gray-400 hover:text-white transition-colors">
                                Parts & Accessories
                            </a>
                        </li>
                        <li>
                            <a href="#contact" class="text-gray-400 hover:text-white transition-colors">
                                Financing Options
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors">
                                Careers
                            </a>
                        </li>
                        <li>
                            <a href="#contact" class="text-gray-400 hover:text-white transition-colors">
                                Contact
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors">
                                Privacy Policy
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors">
                                Terms of Service
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                <p class="text-gray-400">
                    &copy; <span id="current-year"></span> TractorLand. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Mobile Menu Toggle
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.querySelector('.menu-icon');
        const xIcon = document.querySelector('.x-icon');

        function toggleMobileMenu() {
            mobileMenu.classList.toggle('translate-x-full');
            menuIcon.classList.toggle('hidden');
            xIcon.classList.toggle('hidden');
        }

        menuToggle.addEventListener('click', toggleMobileMenu);

        // Product Showcase
        const productBtns = document.querySelectorAll('.product-btn');
        const productImage = document.getElementById('product-image');
        const productName = document.getElementById('product-name');
        const productSpecs = document.getElementById('product-specs');
        const productPrice = document.getElementById('product-price');
        const productTitle = document.getElementById('product-title');
        const productDescription = document.getElementById('product-description');

        productBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Update active button styles
                productBtns.forEach(b => {
                    b.classList.remove('border-tractor-600', 'bg-tractor-50');
                    b.classList.add('border-gray-200', 'hover:border-tractor-300');
                });

                btn.classList.remove('border-gray-200', 'hover:border-tractor-300');
                btn.classList.add('border-tractor-600', 'bg-tractor-50');

                // Update product content
                const { id, name, category, power, image, description, price } = btn.dataset;

                productImage.src = image;
                productImage.alt = name;
                productName.textContent = name;
                productSpecs.textContent = `${power} | ${category}`;
                productPrice.textContent = price;
                productTitle.textContent = name;
                productDescription.textContent = description;
            });
        });

        // Testimonials Slider
        const testimonials = [
            {
                name: "Michael Johnson",
                role: "Farm Owner, Green Valley Farms",
                quote: "The AgriMax Pro X750 has transformed our operation. We've seen a 30% increase in efficiency since making the switch. The power and reliability are unmatched.",
                image: "https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3"
            },
            {
                name: "Sarah Thompson",
                role: "Agricultural Manager, Sunrise Orchards",
                quote: "We've been using TractorLand machines for over 5 years. Their compact models are perfect for our orchard operations, offering the maneuverability we need.",
                image: "https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3"
            },
            {
                name: "Robert Chen",
                role: "Director, Hillside Agricultural Co-op",
                quote: "The customer service at TractorLand is exceptional. When we needed emergency repairs during harvest season, their team was on-site within hours.",
                image: "https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-4.0.3"
            }
        ];

        const testimonialDots = document.querySelectorAll('.testimonial-dot');
        const testimonialImage = document.getElementById('testimonial-image');
        const testimonialQuote = document.getElementById('testimonial-quote');
        const testimonialName = document.getElementById('testimonial-name');
        const testimonialRole = document.getElementById('testimonial-role');

        testimonialDots.forEach(dot => {
            dot.addEventListener('click', () => {
                const index = parseInt(dot.dataset.index);

                // Update active dot styles
                testimonialDots.forEach((d, i) => {
                    if (i === index) {
                        d.classList.remove('bg-gray-300', 'hover:bg-gray-400', 'w-3');
                        d.classList.add('bg-tractor-600', 'w-6');
                    } else {
                        d.classList.remove('bg-tractor-600', 'w-6');
                        d.classList.add('bg-gray-300', 'hover:bg-gray-400', 'w-3');
                    }
                });

                // Update testimonial content
                const testimonial = testimonials[index];
                testimonialImage.src = testimonial.image;
                testimonialImage.alt = testimonial.name;
                testimonialQuote.textContent = `"${testimonial.quote}"`;
                testimonialName.textContent = testimonial.name;
                testimonialRole.textContent = testimonial.role;
            });
        });

        // Contact Form
        const contactForm = document.getElementById('contact-form');
        const submitBtn = document.getElementById('submit-btn');

        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();

            // Disable submit button and show loading state
            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending...';

            // Simulate form submission
            setTimeout(() => {
                // Reset form
                contactForm.reset();

                // Show success message
                const successMessage = document.createElement('div');
                successMessage.className = 'bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded relative mt-4';
                successMessage.innerHTML = `
            <strong class="font-bold">Message Sent!</strong>
            <span class="block sm:inline"> We'll get back to you as soon as possible.</span>
          `;

                contactForm.parentNode.insertBefore(successMessage, contactForm.nextSibling);

                // Reset button
                submitBtn.disabled = false;
                submitBtn.textContent = 'Send Message';

                // Remove success message after 5 seconds
                setTimeout(() => {
                    successMessage.remove();
                }, 5000);
            }, 1500);
        });

        // Update current year in footer
        document.getElementById('current-year').textContent = new Date().getFullYear();

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                // Close mobile menu if open
                if (!mobileMenu.classList.contains('translate-x-full')) {
                    toggleMobileMenu();
                }

                const targetId = this.getAttribute('href');

                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80, // Adjust for navbar height
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>

</html>