<!DOCTYPE html>
<html lang="en">
<?php include 'config.php'; ?>
<?php
include './db/db.php'; // Include database connection
require '../vendor/autoload.php';


$locale = 'en_IN';
$fmt = new NumberFormatter($locale, NumberFormatter::CURRENCY);

try {
    $stmt = $pdo->query("SELECT * FROM tractors WHERE featured = 1");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Failed to fetch products: " . $e->getMessage());
}
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TractorLand - Premium Agricultural Equipment</title>
    <meta name="description"
        content="Discover our exceptional range of high-performance tractors designed to elevate your agricultural productivity." />
    <link rel="stylesheet" href="./output.css">
</head>

<body class=" text-gray-900 ">
    <?php include './includes/header.php'; ?>
    <main>
        <!-- Hero Section -->
        <section class="relative overflow-hidden bg-gradient-to-l from-green-200 to-white py-16 md:py-20">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6 animate-fade-in">
                        <div>
                            <span
                                class="inline-block px-3 py-1 bg-green-200/70 text-green-700 rounded-full text-sm font-medium mb-4">
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
                            <a href="<?= BASE_URL ?>tractor-list.php" class="btn-primary flex items-center gap-2">
                                Explore Models
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </a>
                            <a href="#products" class="btn-secondary flex items-center gap-2">
                                Featured Models

                            </a>
                        </div>
                    </div>

                    <div class="relative h-[300px] md:h-[450px] lg:h-[600px] animate-fade-in w-full"
                        style="animation-delay: 0.2s">
                        <img src="<?= BASE_URL ?>/assets/heroimg.jpg" alt="Tractor"
                            class="absolute  rounded-lg shadow-green-400 shadow-xl transform hover:scale-[1.02] transition-transform duration-300 w-full h-full">
                        </img>
                    </div>
                </div>
            </div>
            </div>

            <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white to-transparent"></div>
        </section>


        <section id="products" class="py-16 md:py-20 bg-white  to-white">
            <div class="container mx-auto px-4">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span
                        class="inline-block px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium mb-4">
                        Our Tractors
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Featured Models</h2>
                    <p class="text-lg text-gray-600">Explore our diverse range of tractors designed to meet all your
                        agricultural needs.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <?php if (!empty($products)): ?>
                        <!-- Display the first product -->
                        <?php $firstProduct = $products[0]; ?>
                        <div class="relative h-[400px] md:h-[500px] rounded-lg overflow-hidden shadow-xl">
                            <a id="product-link" href="tractor.php?id=<?= $firstProduct['id'] ?>">
                                <img id="product-image"
                                    src="<?= BASE_URL ?>/assets/<?= htmlspecialchars($firstProduct['photo_url']) ?>"
                                    alt="<?= htmlspecialchars($firstProduct['name']) ?>"
                                    class="w-full h-full object-cover " />
                            </a>
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                                <h3 id="product-name" class="text-2xl font-bold text-white mb-2">
                                    <?= htmlspecialchars($firstProduct['name']) ?>
                                </h3>
                                <p id="product-specs" class="text-white/90 mb-1">
                                    <?= htmlspecialchars($firstProduct['horsepower']) ?> Horsepower
                                </p>
                                <p id="product-price" class="text-green-400 font-medium">
                                    <?= htmlspecialchars($fmt->formatCurrency($firstProduct['price'], 'INR')) ?>
                                </p>
                            </div>
                        </div>


                        <div class="space-y-8">
                            <div>
                                <h3 id="product-title" class="text-2xl font-bold text-gray-900 mb-4">
                                    <?= htmlspecialchars($firstProduct['name']) ?>
                                </h3>
                                <p id="product-description" class="text-gray-600 mb-6">
                                    <?= htmlspecialchars($firstProduct['description']) ?>
                                </p>

                            </div>

                    
                            <div class="space-y-4">
                                <h4 class="text-lg font-semibold text-gray-900">Browse Models</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    <?php foreach ($products as $index => $product): ?>
                                        <button
                                            class="product-btn cursor-pointer p-4 rounded-lg border-2 transition-all <?= $index === 0 ? 'border-green-600 bg-green-50' : 'border-gray-200 hover:border-green-400' ?>"
                                            data-id="<?= htmlspecialchars($product['id']) ?>"
                                            data-name="<?= htmlspecialchars($product['name']) ?>"
                                            data-brand="<?= htmlspecialchars($product['brand']) ?>"
                                            data-power="<?= htmlspecialchars($product['horsepower']) ?>"
                                            data-image="<?= htmlspecialchars($product['photo_url']) ?>"
                                            data-description="<?= htmlspecialchars($product['description']) ?>"
                                            data-price="<?= htmlspecialchars($product['price']) ?>">
                                            <h5 class="font-medium"><?= htmlspecialchars($product['name']) ?></h5>
                                            <p class="text-sm text-gray-500">HP:<?= htmlspecialchars($product['horsepower']) ?>
                                            </p>
                                        </button>
                                    <?php endforeach; ?>
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>


        <section id="features" class="py-16 md:py-24 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span
                        class="inline-block px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium mb-4">
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
                    <div
                        class="p-6 rounded-xl bg-white shadow-sm shadow-green-400 hover:shadow-lg transition-shadow duration-300 ">
                        <div
                            class="inline-flex items-center justify-center h-12 w-12 rounded-lg bg-green-100 text-green-600 mb-4">
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
                    <div
                        class="p-6 rounded-xl bg-white shadow-sm shadow-green-400 hover:shadow-lg transition-shadow duration-300">
                        <div
                            class="inline-flex items-center justify-center h-12 w-12 rounded-lg bg-green-100 text-green-600 mb-4">
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
                    <div
                        class="p-6 rounded-xl bg-white shadow-sm shadow-green-400 hover:shadow-lg transition-shadow duration-300">
                        <div
                            class="inline-flex items-center justify-center h-12 w-12 rounded-lg bg-green-100 text-green-600 mb-4">
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
                    <div
                        class="p-6 rounded-xl bg-white shadow-sm shadow-green-400 hover:shadow-lg transition-shadow duration-300">
                        <div
                            class="inline-flex items-center justify-center h-12 w-12 rounded-lg bg-green-100 text-green-600 mb-4">
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

                <div class="mt-16 bg-green-600 rounded-xl p-8 md:p-12 text-white">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
                        <div class="lg:col-span-2">
                            <h3 class="text-2xl md:text-3xl font-bold mb-4">Ready to upgrade your farming equipment?
                            </h3>
                            <p class="text-white/90 mb-6 lg:mb-0">
                                Experience the difference with our premium tractors. Book a demo today and see for
                                yourself
                                how our machines can transform your agricultural operations.
                            </p>
                        </div>
                        <div class="flex justify-center lg:justify-end">
                            <a href="tractor-list.php" class="btn-secondary bg-white text-green-600 hover:bg-gray-100">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </main>

    <?php include './includes/footer.php' ?>

    <script>
        const productBtns = document.querySelectorAll('.product-btn');
        const productImage = document.getElementById('product-image');
        const productName = document.getElementById('product-name');
        const productSpecs = document.getElementById('product-specs');
        const productPrice = document.getElementById('product-price');
        const productTitle = document.getElementById('product-title');
        const productDescription = document.getElementById('product-description');
        const productLink = document.querySelector('#product-link');  // Add a reference to the anchor tag

        productBtns.forEach(btn => {
            btn.addEventListener('click', () => {

                
                productBtns.forEach(b => {
                    b.classList.remove('border-green-600', 'bg-green-50');
                    b.classList.add('border-gray-200', 'hover:border-green-300');
                });

                
                btn.classList.remove('border-gray-200', 'hover:border-green-300');
                btn.classList.add('border-green-600', 'bg-green-50');

                
                const { name, category, power, image, description, price, id } = btn.dataset;
                const formatPrice = (price) => {
                    return new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR' }).format(price);
                };
                productImage.src = `<?= BASE_URL ?>/assets/${image}`;;
                productImage.alt = name;
                productName.textContent = name;
                productSpecs.textContent = `${power} Horsepower`;
                productPrice.textContent = formatPrice(price);
                productTitle.textContent = name;
                productDescription.textContent = description;

                
                productLink.href = `tractor.php?id=${id}`;
            });
        });



    </script>
</body>

</html>