<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-900">

    <!-- Navbar -->
    <header class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-3">
            <h1 class="text-2xl font-bold">MyStore</h1>

            <!-- Search -->
            <form class="flex w-1/2 mx-4">
                <input type="text" placeholder="Search products..."
                    class="w-full border rounded-l-lg px-3 py-2 focus:outline-none" />
                <button type="submit" class="bg-blue-600 text-white px-4 rounded-r-lg">Search</button>
            </form>

            <!-- Cart -->
            <div>
                <a href="#" class="relative">
                    🛒
                    <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs px-1 rounded-full">3</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Hero / Catalog Banner -->
    <section class="bg-blue-600 text-white text-center py-12">
        <h2 class="text-3xl font-bold">Welcome to Our Store</h2>
        <p class="mt-2">Find your best products here</p>
        <a href="#catalog" class="mt-4 inline-block bg-white text-blue-600 px-6 py-2 rounded-lg font-semibold">
            Browse Catalog
        </a>
    </section>

    <!-- Featured Products -->
    <section class="max-w-7xl mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-semibold">Featured Products</h3>
            <a href="#" class="text-blue-600">View All</a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Product Card -->
            <div class="bg-white shadow rounded-lg p-4">
                <img src="https://via.placeholder.com/200" alt="Product" class="rounded">
                <h4 class="mt-2 font-semibold">Product Name</h4>
                <p class="text-gray-600">$29.99</p>
                <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded w-full">Add to Cart</button>
            </div>

            <div class="bg-white shadow rounded-lg p-4">
                <img src="https://via.placeholder.com/200" alt="Product" class="rounded">
                <h4 class="mt-2 font-semibold">Another Product</h4>
                <p class="text-gray-600">$49.99</p>
                <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded w-full">Add to Cart</button>
            </div>

            <div class="bg-white shadow rounded-lg p-4">
                <img src="https://via.placeholder.com/200" alt="Product" class="rounded">
                <h4 class="mt-2 font-semibold">Product Name</h4>
                <p class="text-gray-600">$29.99</p>
                <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded w-full">Add to Cart</button>
            </div>

            <div class="bg-white shadow rounded-lg p-4">
                <img src="https://via.placeholder.com/200" alt="Product" class="rounded">
                <h4 class="mt-2 font-semibold">Another Product</h4>
                <p class="text-gray-600">$49.99</p>
                <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded w-full">Add to Cart</button>
            </div>
            
            <div class="bg-white shadow rounded-lg p-4">
                <img src="https://via.placeholder.com/200" alt="Product" class="rounded">
                <h4 class="mt-2 font-semibold">Product Name</h4>
                <p class="text-gray-600">$29.99</p>
                <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded w-full">Add to Cart</button>
            </div>

            <div class="bg-white shadow rounded-lg p-4">
                <img src="https://via.placeholder.com/200" alt="Product" class="rounded">
                <h4 class="mt-2 font-semibold">Another Product</h4>
                <p class="text-gray-600">$49.99</p>
                <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded w-full">Add to Cart</button>
            </div>
            
            <div class="bg-white shadow rounded-lg p-4">
                <img src="https://via.placeholder.com/200" alt="Product" class="rounded">
                <h4 class="mt-2 font-semibold">Product Name</h4>
                <p class="text-gray-600">$29.99</p>
                <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded w-full">Add to Cart</button>
            </div>

            <div class="bg-white shadow rounded-lg p-4">
                <img src="https://via.placeholder.com/200" alt="Product" class="rounded">
                <h4 class="mt-2 font-semibold">Another Product</h4>
                <p class="text-gray-600">$49.99</p>
                <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded w-full">Add to Cart</button>
            </div>

            <div class="bg-white shadow rounded-lg p-4">
                <img src="https://via.placeholder.com/200" alt="Product" class="rounded">
                <h4 class="mt-2 font-semibold">Product Name</h4>
                <p class="text-gray-600">$29.99</p>
                <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded w-full">Add to Cart</button>
            </div>

            <div class="bg-white shadow rounded-lg p-4">
                <img src="https://via.placeholder.com/200" alt="Product" class="rounded">
                <h4 class="mt-2 font-semibold">Another Product</h4>
                <p class="text-gray-600">$49.99</p>
                <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded w-full">Add to Cart</button>
            </div>
            
            <div class="bg-white shadow rounded-lg p-4">
                <img src="https://via.placeholder.com/200" alt="Product" class="rounded">
                <h4 class="mt-2 font-semibold">Product Name</h4>
                <p class="text-gray-600">$29.99</p>
                <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded w-full">Add to Cart</button>
            </div>

            <div class="bg-white shadow rounded-lg p-4">
                <img src="https://via.placeholder.com/200" alt="Product" class="rounded">
                <h4 class="mt-2 font-semibold">Another Product</h4>
                <p class="text-gray-600">$49.99</p>
                <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded w-full">Add to Cart</button>
            </div>
        </div>
    </section>

    <!-- Latest Products -->
    <section class="max-w-7xl mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-semibold">Latest Products</h3>
            <a href="#" class="text-blue-600">View All</a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white shadow rounded-lg p-4">
                <img src="https://via.placeholder.com/200" alt="Product" class="rounded">
                <h4 class="mt-2 font-semibold">New Product</h4>
                <p class="text-gray-600">$19.99</p>
                <button class="mt-2 bg-green-600 text-white px-4 py-2 rounded w-full">Add to Cart</button>
            </div>
        </div>
    </section>

    <!-- Payment CTA -->
    <section class="bg-gray-100 py-12 text-center">
        <h3 class="text-2xl font-semibold">Ready to Checkout?</h3>
        <p class="mt-2 text-gray-600">Proceed to secure payment and complete your order</p>
        <a href="#payment" class="mt-4 inline-block bg-green-600 text-white px-6 py-2 rounded-lg font-semibold">
            Go to Payment
        </a>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-200 py-6 text-center">
        <p>&copy; 2025 MyStore. All rights reserved.</p>
    </footer>

    <button id="scrollTopBtn"
        class="hidden fixed bottom-6 right-6 bg-blue-600 text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center hover:bg-blue-700 transition">
        ↑
    </button>
    <script>
        const scrollTopBtn = document.getElementById("scrollTopBtn");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 200) {
                scrollTopBtn.classList.remove("hidden");
            } else {
                scrollTopBtn.classList.add("hidden");
            }
        });

        scrollTopBtn.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>
</body>

</html>
