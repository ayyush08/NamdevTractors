<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <a href="index.php" class="text-tractor-600 font-bold text-2xl">
                    TractorTrailblazer
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-8">
                <a href="index.php" class="text-tractor-600 border-b-2 border-tractor-500 font-medium">Home</a>
                <a href="#" class="text-gray-700 hover:text-tractor-600 font-medium">Tractors</a>
                <a href="#" class="text-gray-700 hover:text-tractor-600 font-medium">Implements</a>
                <a href="#" class="text-gray-700 hover:text-tractor-600 font-medium">Services</a>
                <a href="#" class="text-gray-700 hover:text-tractor-600 font-medium">About Us</a>
                <a href="#" class="text-gray-700 hover:text-tractor-600 font-medium">Contact</a>
            </nav>

            <div class="flex items-center space-x-4">
                <div class="hidden md:flex items-center text-tractor-800">
                    <span class="inline-block w-4 h-4 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                    </span>
                    <span class="font-medium">1-800-TRACTOR</span>
                </div>
                
                <button class="p-2 rounded-full hover:bg-gray-100">
                    <span class="inline-block w-5 h-5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </span>
                </button>
                
                <button class="p-2 rounded-full hover:bg-gray-100">
                    <span class="inline-block w-5 h-5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </span>
                </button>
                
                <button class="md:hidden p-2 rounded-full hover:bg-gray-100" id="mobile-menu-button">
                    <span class="inline-block w-6 h-6">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu (Hidden by default) -->
    <div class="hidden bg-white border-t py-2 px-4 shadow-md" id="mobile-menu">
        <nav class="flex flex-col space-y-3 py-3">
            <a href="index.php" class="text-tractor-600 font-medium py-1">Home</a>
            <a href="#" class="text-gray-700 hover:text-tractor-600 py-1">Tractors</a>
            <a href="#" class="text-gray-700 hover:text-tractor-600 py-1">Implements</a>
            <a href="#" class="text-gray-700 hover:text-tractor-600 py-1">Services</a>
            <a href="#" class="text-gray-700 hover:text-tractor-600 py-1">About Us</a>
            <a href="#" class="text-gray-700 hover:text-tractor-600 py-1">Contact</a>
            <div class="flex items-center text-tractor-800 py-1">
                <span class="inline-block w-4 h-4 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                </span>
                <span>1-800-TRACTOR</span>
            </div>
        </nav>
    </div>
</header>

<script>
    // Mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', function() {
                const mobileMenu = document.getElementById('mobile-menu');
                mobileMenu.classList.toggle('hidden');
            });
        }
    });
</script>