<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-sm shadow-sm">
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <a href="<?= BASE_URL ?>index.php" class="flex items-center">
                    <span class="text-2xl font-bold text-green-600">
                        <?php echo APP_NAME; ?>
                    </span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex space-x-8">
                <a href="<?= BASE_URL ?>index.php"
                    class="text-gray-700 hover:text-green-600 font-medium transition-colors">Home</a>
                <a href="<?= BASE_URL ?>tractor-list.php"
                    class="text-gray-700 hover:text-green-600 font-medium transition-colors">Products</a>
                <a href="<?=BASE_URL ?>index.php#features"
                    class="text-gray-700 hover:text-green-600 font-medium transition-colors">Features</a>
                <a href="<?= BASE_URL ?>includes/contact-form.php"
                    class="text-gray-700 hover:text-green-600 font-medium transition-colors">Contact Us</a>
            </div>


</nav>

<!-- <script src="./js/header.js"></script> -->