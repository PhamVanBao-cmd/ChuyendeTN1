@extends('layouts.user')

@section('title', 'Danh mục sản phẩm')

@section('content')

<!-- Hero Section hiển thị tiêu đề trang danh mục -->
<section class="bg-gradient-to-r from-orange-500 to-orange-600 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 text-center">

        <!-- Tiêu đề chính -->
        <h1 class="text-3xl md:text-4xl font-bold mb-4">
            Danh mục sản phẩm
        </h1>

        <!-- Mô tả -->
        <p class="text-xl">
            Khám phá các danh mục nội thất cao cấp của chúng tôi
        </p>
    </div>
</section>

<!-- Section hiển thị danh sách danh mục -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4">

        {{-- Kiểm tra nếu có danh mục --}}
        @if($categories->count() > 0)

            <!-- Grid danh mục -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- Lặp qua từng danh mục --}}
                @foreach($categories as $category)

                    <!-- Card danh mục -->
                    <div 
                        class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition group cursor-pointer"
                        onclick="window.location.href='/category/{{ $category->id }}'"
                    >

                        {{-- Kiểm tra nếu có hình ảnh --}}
                        @if($category->image)

                            <!-- Ảnh danh mục -->
                            <img 
                                src="{{ asset($category->image) }}"
                                alt="{{ $category->name }}"
                                class="w-full h-48 object-cover group-hover:scale-105 transition duration-300"
                            >

                        @else

                            <!-- Placeholder khi không có ảnh -->
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center group-hover:bg-gray-300 transition duration-300">
                                <span class="text-gray-500 text-lg font-semibold">
                                    {{ $category->name }}
                                </span>
                            </div>

                        @endif

                        <!-- Nội dung card -->
                        <div class="p-6">

                            <!-- Tên danh mục -->
                            <h3 class="text-xl font-semibold mb-2 text-gray-800 group-hover:text-orange-600 transition">
                                {{ $category->name }}
                            </h3>

                            <!-- Mô tả danh mục -->
                            <p class="text-gray-600 mb-4">
                                {{ Str::limit($category->description, 100) }}
                            </p>

                            <!-- Thông tin sản phẩm -->
                            <div class="flex justify-between items-center">

                                <!-- Tổng số sản phẩm -->
                                <span class="text-sm text-gray-500">
                                    {{ $category->products_count ?? $category->products->count() }} sản phẩm
                                </span>

                                <!-- Link xem sản phẩm -->
                                <span class="text-orange-600 font-semibold hover:text-orange-700 transition">
                                    Xem sản phẩm &rarr;
                                </span>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

        @else

            <!-- Hiển thị khi chưa có danh mục -->
            <div class="text-center py-12">

                <!-- Icon -->
                <div class="text-gray-400 text-6xl mb-4">
                    <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path 
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                </div>

                <!-- Thông báo -->
                <h3 class="text-xl font-semibold text-gray-700 mb-2">
                    Chưa Có Danh Mục Nào
                </h3>

                <p class="text-gray-500">
                    Hiện tại chưa có danh mục nào.
                </p>
            </div>

        @endif
    </div>
</section>

@endsection