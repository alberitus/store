<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-900">

    <header class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-3">
            <div class="flex items-center gap-2">
                <img src="{{ asset('assets/img/dashboard.png') }}" alt="Logo" class="w-10 h-10">
                <div class="text-2xl font-bold">MyStore</div>
            </div>

            <form class="flex w-1/2 mx-4">
                <input type="text" placeholder="Search products..."
                    class="w-full border rounded-l-lg px-3 py-2 focus:outline-none" />
                <button type="submit" class="bg-blue-600 text-white px-4 rounded-r-lg">Search</button>
            </form>

            <div>
                <a href="#" class="relative">
                    🛒
                    <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs px-1 rounded-full">3</span>
                </a>
            </div>
        </div>
    </header>

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
            <a href="/" class="text-blue-600 hover:underline">View All</a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @forelse ($featuredProducts as $item)
                <div class="bg-white shadow rounded-lg p-4 hover:shadow-lg transition">
                    <div class="relative group cursor-pointer">
                        @if ($item->image)
                            <img data-src="{{ asset('storage/' . $item->image) }}"
                                class="rounded w-full h-48 object-cover lazyload" alt="{{ $item->name }}">
                        @else
                            <img data-src="{{ asset('assets/img/no-image.png') }}"
                                class="rounded w-full h-48 object-cover lazyload" alt="No Image">
                        @endif

                        <!-- Overlay teks -->
                        <div
                            class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 
                                    flex items-center justify-center rounded transition duration-300">
                            <span class="text-white font-semibold">Lihat Gambar</span>
                        </div>
                    </div>

                    <h4 class="mt-2 font-semibold text-lg">{{ $item->name }}</h4>
                    <p class="text-gray-600">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                    <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded w-full hover:bg-blue-500">
                        Add to Cart
                    </button>
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-500">No featured products available.</p>
            @endforelse
        </div>
    </section>

    <!-- Latest Products -->
    <section class="max-w-7xl mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-semibold">Latest Products</h3>
            <a href="/" class="text-blue-600 hover:underline">View All</a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @forelse ($latestProducts as $item)
                <div class="bg-white shadow rounded-lg p-4 hover:shadow-lg transition">
                    <div class="relative group cursor-pointer">
                        @if ($item->image)
                            <img data-src="{{ asset('storage/' . $item->image) }}"
                                class="rounded w-full h-48 object-cover lazyload" alt="{{ $item->name }}">
                        @else
                            <img data-src="{{ asset('assets/img/no-image.png') }}"
                                class="rounded w-full h-48 object-cover lazyload" alt="No Image">
                        @endif

                        <!-- Overlay teks -->
                        <div
                            class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 
                                    flex items-center justify-center rounded transition duration-300">
                            <span class="text-white font-semibold">Lihat Gambar</span>
                        </div>
                    </div>
                    <h4 class="mt-2 font-semibold text-lg">{{ $item->name }}</h4>
                    <p class="text-gray-600">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                    <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded w-full hover:bg-blue-500">
                        Add to Cart
                    </button>
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-500">No recent products available.</p>
            @endforelse
        </div>
    </section>

    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-70 hidden items-center justify-center z-50">
        <div class="relative max-w-3xl mx-auto">
            <img id="modalImage" src="" alt="Preview"
                class="rounded-lg max-h-[80vh] object-contain shadow-lg transform scale-95 opacity-0 transition-all duration-300">
            <button id="closeModal"
                class="absolute top-2 right-2 bg-white rounded-full p-2 text-gray-800 hover:bg-gray-200">
                ✕
            </button>
        </div>
    </div>

    <section class="bg-gray-100 py-12 text-center">
        <h3 class="text-2xl font-semibold">Ready to Checkout?</h3>
        <p class="mt-2 text-gray-600">Proceed to secure payment and complete your order</p>
        <a href="#payment" class="mt-4 inline-block bg-green-600 text-white px-6 py-2 rounded-lg font-semibold">
            Go to Payment
        </a>
    </section>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        const closeModal = document.getElementById('closeModal');

        document.querySelectorAll('.lazyload').forEach(img => {
            img.addEventListener('mouseenter', function() {
                modalImage.src = this.getAttribute('data-src') || this.src;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                setTimeout(() => {
                    modalImage.classList.remove('opacity-0', 'scale-95');
                    modalImage.classList.add('opacity-100', 'scale-100');
                }, 50);
            });

            img.addEventListener('mouseleave', function() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                modalImage.classList.add('opacity-0', 'scale-95');
                modalImage.classList.remove('opacity-100', 'scale-100');
            });
        });

        closeModal.addEventListener('click', () => modal.classList.add('hidden'));
    });
</script>

</html>
