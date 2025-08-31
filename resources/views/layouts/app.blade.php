<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THAI EDUCATE NEWS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f9;
        }
        /* เพิ่มสไตล์สำหรับเส้นใต้บนลิงก์เมนูเมื่อวางเมาส์ */
        .nav-link-underline {
            position: relative;
        }
        .nav-link-underline::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 0;
            height: 2px;
            background-color: #fb923c; /* สีส้มพาสเทล */
            transition: width 0.3s ease-in-out;
        }
        .nav-link-underline:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- ส่วนของ Navbar -->
    <nav class="bg-orange-300 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- โลโก้และชื่อแบรนด์ -->
                <div class="flex items-center">
                    <h1 class="text-gray-800 text-2xl font-bold flex items-center">
                        <i class="fas fa-graduation-cap text-orange-600 mr-3"></i>
                        <a href="{{ route('news') }}" class="hover:text-gray-600 transition duration-300">
                            THAI EDUCATE NEWS
                        </a>
                    </h1>
                </div>

                <!-- ลิงก์เมนู -->
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8 items-center">
                    <a href="{{ route('news') }}" class="nav-link-underline text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md font-medium transition duration-300">หน้าหลัก</a>
                    <a href="{{ route('news') }}" class="nav-link-underline text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md font-medium transition duration-300">บทความ</a>
                    <a href="{{ route('news') }}" class="nav-link-underline text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md font-medium transition duration-300">เกี่ยวกับเรา</a>
                    <a href="{{ route('news') }}" class="nav-link-underline text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md font-medium transition duration-300">ติดต่อ</a>
                    <a href="{{ route('news') }}" class="bg-orange-500 text-white px-5 py-2 rounded-full font-semibold shadow-md hover:bg-orange-600 transition duration-300 transform hover:scale-105">เข้าสู่ระบบ</a>
                </div>
            </div>
        </div>

        <!-- เมนูสำหรับมือถือ (ซ่อนไว้สำหรับหน้าจอขนาดใหญ่) -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('news') }}" class="text-gray-800 hover:bg-orange-400 block px-3 py-2 rounded-md text-base font-medium">หน้าหลัก</a>
                <a href="{{ route('news') }}" class="text-gray-800 hover:bg-orange-400 block px-3 py-2 rounded-md text-base font-medium">บทความ</a>
                <a href="{{ route('news') }}" class="text-gray-800 hover:bg-orange-400 block px-3 py-2 rounded-md text-base font-medium">เกี่ยวกับเรา</a>
                <a href="{{ route('news') }}" class="text-gray-800 hover:bg-orange-400 block px-3 py-2 rounded-md text-base font-medium">ติดต่อ</a>
                <a href="{{ route('news') }}" class="bg-orange-500 text-white block px-3 py-2 rounded-md text-base font-medium text-center">เข้าสู่ระบบ</a>
            </div>
        </div>
    </nav>
    
    <!-- ส่วนเนื้อหาหลัก -->
    <main class="py-10">
        @yield('content')
    </main>

    <!-- ส่วนของ Footer -->
    <footer class="bg-orange-100 text-gray-700 py-12 rounded-t-xl shadow-inner">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                
                <!-- คอลัมน์ที่ 1: โลโก้และคำอธิบาย -->
                <div class="flex flex-col items-center md:items-start">
                    <span class="text-3xl font-bold tracking-wider text-orange-500">ข่าวการศึกษาไทย</span>
                    <p class="mt-4 text-gray-600">
                        แหล่งรวมข่าวสารและบทความด้านการศึกษาที่เป็นประโยชน์สำหรับทุกคน
                    </p>
                </div>
                
                <!-- คอลัมน์ที่ 2: ลิงก์ด่วน -->
                <div class="mt-6 md:mt-0">
                    <h3 class="text-xl font-semibold mb-4 text-orange-400">ลิงก์ด่วน</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li><a href="{{ route('news') }}" class="hover:text-orange-500 transition-colors duration-300">หน้าหลัก</a></li>
                        <li><a href="{{ route('news') }}" class="hover:text-orange-500 transition-colors duration-300">บทความ</a></li>
                        <li><a href="{{ route('news') }}" class="hover:text-orange-500 transition-colors duration-300">เกี่ยวกับเรา</a></li>
                        <li><a href="{{ route('news') }}" class="hover:text-orange-500 transition-colors duration-300">ติดต่อ</a></li>
                    </ul>
                </div>
                
                <!-- คอลัมน์ที่ 3: ติดตามเรา -->
                <div class="mt-6 md:mt-0">
                    <h3 class="text-xl font-semibold mb-4 text-orange-400">ติดตามเรา</h3>
                    <div class="flex justify-center md:justify-start space-x-4">
                        <!-- ไอคอนโซเชียลมีเดีย -->
                        <a href="{{ route('news') }}" class="text-gray-600 hover:text-orange-500 transition-colors duration-300 transform hover:scale-110">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>
                        <a href="{{ route('news') }}" class="text-gray-600 hover:text-orange-500 transition-colors duration-300 transform hover:scale-110">
                            <i class="fab fa-twitter text-lg"></i>
                        </a>
                        <a href="{{ route('news') }}" class="text-gray-600 hover:text-orange-500 transition-colors duration-300 transform hover:scale-110">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- ส่วนลิขสิทธิ์ -->
            <div class="mt-12 border-t border-gray-300 pt-8 text-center">
                <p class="text-gray-500">&copy; 2025 ข่าวการศึกษาไทย. เว็บไซต์นี้จัดทำขึ้นเพื่อการศึกษาเท่านั้น</p>
            </div>
        </div>
    </footer>

</body>
</html>
