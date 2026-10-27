<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexxManage - Platform Manajemen Proyek</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#FAFAFA] font-sans text-gray-800 overflow-x-hidden">

        <!-- ================= NAVBAR ================= -->
    <nav x-data="{ activeSection: 'beranda' }" 
         @scroll.window="
            let sections = ['beranda', 'fitur', 'tentang'];
            let current = 'beranda';
            sections.forEach(section => {
                let el = document.getElementById(section);
                if (el && window.scrollY >= (el.offsetTop - 200)) {
                    current = section;
                }
            });
            activeSection = current;
         "
         class="bg-white border-b border-gray-100 sticky top-0 z-50">
        
        <div class="max-w-screen-2xl mx-auto py-4 px-8 lg:px-24 flex justify-between items-center">
            <div class="flex items-center text-2xl font-bold text-gray-900">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-9 h-9 mr-2 object-contain">
                NexxManage.
            </div>
            
            <div class="hidden md:flex space-x-8 text-sm font-medium text-gray-600">
                <a href="#beranda" 
                   :class="activeSection === 'beranda' ? 'text-[#6D28D9] border-b-2 border-[#6D28D9] pb-1' : 'hover:text-[#6D28D9] transition'"
                   class="transition">Beranda</a>
                <a href="#fitur" 
                   :class="activeSection === 'fitur' ? 'text-[#6D28D9] border-b-2 border-[#6D28D9] pb-1' : 'hover:text-[#6D28D9] transition'"
                   class="transition">Fitur</a>
                <a href="#tentang" 
                   :class="activeSection === 'tentang' ? 'text-[#6D28D9] border-b-2 border-[#6D28D9] pb-1' : 'hover:text-[#6D28D9] transition'"
                   class="transition">Tentang</a>
                <a href="#kontak" 
                   class="hover:text-[#6D28D9] transition">Kontak</a>
            </div>

            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}" class="text-sm font-medium border border-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-50 transition">Login</a>
                <a href="{{ route('register') }}" class="text-sm font-medium bg-[#6D28D9] text-white px-6 py-2 rounded-lg hover:bg-[#5B21B6] transition">Register</a>
            </div>
        </div>
    </nav>

    <!-- ================= HERO SECTION ================= -->
    <section id="beranda" class="relative bg-[#F8F8FA] pt-12 pb-16 lg:pt-16 lg:pb-20 overflow-hidden">
        <div class="max-w-screen-2xl mx-auto px-8 lg:px-24 flex flex-col lg:flex-row items-center">

            <!-- Kiri: Teks -->
            <div class="lg:w-1/2 z-10 mb-16 lg:mb-0">
                <div
                    class="inline-block bg-purple-100 text-[#6D28D9] font-semibold text-xs px-3 py-1 rounded-full mb-6">
                    Manajemen Proyek & Bisnis
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold leading-tight mb-6 text-gray-900">
                    Kelola Proyek, Tim, dan<br>Bisnis Anda dalam <span class="text-[#6D28D9]">Satu<br>Platform</span>
                </h1>
                <p class="text-gray-500 text-base mb-8 leading-relaxed pr-10">
                    NexxManage adalah aplikasi manajemen berbasis web yang membantu Anda mengelola proyek, tugas,
                    pesanan, keuangan, dan bisnis lainnya dengan lebih mudah, terstruktur, dan efisien.
                </p>
                <div class="flex space-x-4">
                    <a href="{{ route('register') }}"
                        class="bg-[#6D28D9] text-white px-8 py-3 rounded-lg font-medium hover:bg-[#5B21B6] transition shadow-lg shadow-purple-200">
                        Mulai Sekarang &rarr;
                    </a>
                    <a href="#"
                        class="bg-white border border-gray-300 text-[#6D28D9] px-8 py-3 rounded-lg font-medium hover:bg-gray-50 transition">
                        Lihat Fitur
                    </a>
                </div>
            </div>

            <!-- Kanan: Mockup Laptop -->
            <div class="lg:w-1/2 relative flex justify-center items-center mt-10 lg:mt-0">
                <div
                    class="absolute w-[400px] h-[400px] bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-50 -z-10">
                </div>

                <!-- Hanya menyisakan gambar laptop ini -->
                <img src="{{ asset('images/mockup-laptop.png') }}" alt="Dashboard Mockup"
                    class="w-full max-w-2xl object-contain drop-shadow-2xl z-10">
            </div>
        </div>
    </section>

    <!-- ================= 5 FITUR ICON ================= -->
    <section id="fitur" class="bg-white py-20 border-y border-gray-100">
        <div class="max-w-screen-2xl mx-auto px-8 lg:px-24 grid grid-cols-1 md:grid-cols-5 gap-8">

            <!-- Fitur 1 -->
            <div class="flex flex-col items-start text-left">
                <div
                    class="w-20 h-20 bg-[#FEF3C7] text-[#D97706] rounded-2xl flex items-center justify-center mb-6 text-4xl">
                    📁</div>
                <h3 class="font-bold text-lg mb-3 text-gray-900">Manajemen Proyek</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Pantau progres proyek secara real-time.</p>
            </div>

            <!-- Fitur 2 -->
            <div class="flex flex-col items-start text-left">
                <div
                    class="w-20 h-20 bg-[#CCFBF1] text-[#0D9488] rounded-2xl flex items-center justify-center mb-6 text-4xl">
                    📋</div>
                <h3 class="font-bold text-lg mb-3 text-gray-900">Manajemen Tugas</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Atur dan delegasikan tugas kepada tim.</p>
            </div>

            <!-- Fitur 3 -->
            <div class="flex flex-col items-start text-left">
                <div
                    class="w-20 h-20 bg-[#FCE7F3] text-[#DB2777] rounded-2xl flex items-center justify-center mb-6 text-4xl">
                    🛒</div>
                <h3 class="font-bold text-lg mb-3 text-gray-900">Manajemen Pemesanan</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Kelola pesanan pelanggan dengan lebih terstruktur.</p>
            </div>

            <!-- Fitur 4 -->
            <div class="flex flex-col items-start text-left">
                <div
                    class="w-20 h-20 bg-[#DCFCE7] text-[#16A34A] rounded-2xl flex items-center justify-center mb-6 text-4xl">
                    💵</div>
                <h3 class="font-bold text-lg mb-3 text-gray-900">Manajemen Keuangan</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Catat pemasukan, pengeluaran, dan lihat laporan
                    keuangan.</p>
            </div>

            <!-- Fitur 5 -->
            <div class="flex flex-col items-start text-left">
                <div
                    class="w-20 h-20 bg-[#F3E8FF] text-[#7E22CE] rounded-2xl flex items-center justify-center mb-6 text-4xl">
                    📊</div>
                <h3 class="font-bold text-lg mb-3 text-gray-900">Laporan & Analitik</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Dapatkan insight dari data bisnis anda.</p>
            </div>

        </div>
    </section>

    <!-- ================= SOLUSI LENGKAP ================= -->
    <section id="tentang" class="bg-[#F8F8FA] py-24">
        <div class="max-w-screen-2xl mx-auto px-8 lg:px-24 flex flex-col lg:flex-row items-center">

            <!-- Kiri: Teks -->
            <div class="lg:w-1/2 mb-12 lg:mb-0">
                <div
                    class="inline-block bg-purple-100 text-[#6D28D9] font-semibold text-xs px-3 py-1 rounded-full mb-4">
                    Mengapa Memilih NexxManage?
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold leading-tight mb-6 text-gray-900">
                    Solusi lengkap untuk kebutuhan<br>Manajemen Anda
                </h2>
                <p class="text-gray-500 text-lg mb-8 leading-relaxed max-w-lg">
                    Dengan fitur yang lengkap dan tampilan yang intuitif, NexxManage dirancang untuk membantu organisasi
                    kecil hingga menengah dalam mengelola operasional bisnis dengan lebih efektif.
                </p>
                <a href="{{ route('register') }}"
                    class="bg-[#6D28D9] text-white px-8 py-3 rounded-lg text-base font-medium hover:bg-[#5B21B6] transition shadow-lg shadow-purple-200">
                    Pelajari Lebih Lanjut &rarr;
                </a>
            </div>

            <!-- Kanan: Ilustrasi -->
            <div class="lg:w-1/2 flex justify-center lg:justify-end">
                <img src="{{ asset('images/accept-task.svg') }}" alt="Ilustrasi NexxManage"
                    class="w-full max-w-lg object-contain">
            </div>

        </div>
    </section>

    <!-- ================= AKSES SESUAI PERAN ================= -->
    <section class="bg-[#F8F8FA] py-20">
        <div class="max-w-screen-2xl mx-auto px-8 lg:px-24 text-center">
            <div class="inline-block bg-purple-100 text-[#6D28D9] font-semibold text-xs px-3 py-1 rounded-full mb-4">
                Untuk Semua Peran
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Akses Sesuai Peran Anda</h2>
            <p class="text-gray-500 text-base mb-12">Setiap pengguna memiliki akses yang berbeda sesuai dengan tanggung
                jawabnya.</p>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Card Owner -->
                <div
                    class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-left relative group hover:shadow-md transition cursor-pointer">
                    <div class="flex justify-between items-start mb-4">
                        <div class="text-3xl">👑</div>
                        <div
                            class="text-gray-400 bg-gray-50 rounded-full p-2 group-hover:bg-purple-100 group-hover:text-purple-600 transition">
                            &rarr;</div>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Owner</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Mengelola seluruh data, pengguna, hak akses,
                        keuangan, laporan, dan log aktivitas</p>
                </div>

                <!-- Card Manager -->
                <div
                    class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-left relative group hover:shadow-md transition cursor-pointer">
                    <div class="flex justify-between items-start mb-4">
                        <div class="text-3xl text-blue-500">👥</div>
                        <div
                            class="text-gray-400 bg-gray-50 rounded-full p-2 group-hover:bg-blue-100 group-hover:text-blue-600 transition">
                            &rarr;</div>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Manager</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Mengelola pesanan, proyek, tugas, dan melihat
                        laporan.</p>
                </div>

                <!-- Card Staff -->
                <div
                    class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-left relative group hover:shadow-md transition cursor-pointer">
                    <div class="flex justify-between items-start mb-4">
                        <div class="text-3xl text-purple-500">👨‍💻</div>
                        <div
                            class="text-gray-400 bg-gray-50 rounded-full p-2 group-hover:bg-purple-100 group-hover:text-purple-600 transition">
                            &rarr;</div>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Staff</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Mengelola proyek dan tugas yang diberikan.</p>
                </div>

                <!-- Card Finance -->
                <div
                    class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-left relative group hover:shadow-md transition cursor-pointer">
                    <div class="flex justify-between items-start mb-4">
                        <div class="text-3xl text-green-500">💰</div>
                        <div
                            class="text-gray-400 bg-gray-50 rounded-full p-2 group-hover:bg-green-100 group-hover:text-green-600 transition">
                            &rarr;</div>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Finance</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Mengelola keuangan, pengeluaran, serta melihat
                        proyek dan pesanan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer class="bg-[#2D1B69] text-white py-8 px-8 lg:px-24">
        <div class="max-w-screen-2xl mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center mb-4 md:mb-0">
                <img src="{{ asset('images/logo.png') }}" alt="Logo"
                    class="w-8 h-8 mr-2 object-contain brightness-0 invert">
                <div>
                    <p class="font-bold text-lg">NexxManage.</p>
                    <p class="text-xs text-gray-400">Manajemen lebih mudah, bisnis lebih maju.</p>
                </div>
            </div>

            <div class="flex space-x-8 text-sm text-gray-300 mb-4 md:mb-0">
                <a href="#" class="hover:text-white">Beranda</a>
                <a href="#" class="hover:text-white">Fitur</a>
                <a href="#" class="hover:text-white">Tentang</a>
                <a href="#" class="hover:text-white">Kontak</a>
            </div>

            <div class="flex items-center space-x-4 text-sm text-gray-400">
                <div class="flex space-x-3 text-lg">
                    <a href="#" class="hover:text-white">in</a>
                    <a href="#" class="hover:text-white">ig</a>
                </div>
                <span class="border-l border-gray-600 pl-4">&copy; 2026 NexxManage. All Rights Reserved.</span>
            </div>
        </div>
    </footer>

</body>

</html>
