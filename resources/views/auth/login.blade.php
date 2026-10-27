<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NexxManage</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white h-screen flex overflow-hidden">

    <!-- KIRI: Area Putih dengan Gambar Memenuhi Setengah Layar -->
    <div class="hidden lg:flex lg:w-1/2 p-6 bg-white items-center justify-center h-screen">
        <div class="relative w-full h-full rounded-[2.5rem] overflow-hidden">
            <img src="{{ asset('images/landingpage.jpg') }}" class="absolute inset-0 w-full h-full object-cover"
                alt="Abstract Background">
        </div>
    </div>

    <!-- KANAN: Form Login -->
    <div class="w-full lg:w-1/2 flex items-center justify-center px-8 sm:px-12 py-10 overflow-y-auto">
        <div class="w-full max-w-md">
            <!-- Logo -->
            <div class="flex justify-center mb-2">
                <h1 class="text-2xl font-bold text-gray-900 flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12 h-12 mr-1 object-contain">
                    NexxManage.
                </h1>
            </div>

            <h2 class="text-5xl font-bold text-center text-gray-900 mb-2">Welcome Back!</h2>
            <p class="text-center text-gray-500 mb-[80px]">Enter your details to log in to your account</p>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full border-0 border-b-2 border-gray-300 focus:border-[#6D28D9] focus:ring-0 px-0 py-2 text-gray-900 bg-transparent placeholder-gray-400"
                        placeholder="name@company.com">
                    @if ($errors->has('email'))
                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full border-0 border-b-2 border-gray-300 focus:border-[#6D28D9] focus:ring-0 px-0 py-2 text-gray-900 bg-transparent placeholder-gray-400"
                        placeholder="Enter your password">
                    @if ($errors->has('password'))
                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between mt-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="w-4 h-4 text-[#6D28D9] bg-gray-100 border-gray-300 rounded focus:ring-[#6D28D9] focus:ring-2">
                        <span class="ml-2 text-sm text-gray-700">Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-[#6D28D9] hover:underline">Forgot Password?</a>
                    @endif
                </div>

                                <!-- Tombol Login -->
                <div class="pt-6">
                    <button type="submit"
                        class="w-full bg-[#2D1B69] hover:bg-[#1A0F3D] text-white font-medium py-3 rounded-full transition">
                        Login
                    </button>
                </div>
            </form> <!-- Tutup form di sini -->

            <!-- Garis Pemisah "Or continue with" -->
            <div class="mt-8 mb-6 flex items-center">
                <div class="flex-grow border-t border-gray-300"></div>
                <span class="flex-shrink-0 mx-4 text-gray-400 text-sm">Or continue with</span>
                <div class="flex-grow border-t border-gray-300"></div>
            </div>

            <!-- Tombol Sosial Media (Hanya UI) -->
            <div class="space-y-3">
                <!-- Apple -->
                <button type="button" class="w-full flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-3 rounded-full transition">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.84 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.57 1.5-1.31 2.99-2.54 4.09l.01-.01zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/></svg>
                    Sign in with Apple
                </button>

                <!-- Google -->
                <button type="button" class="w-full flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-3 rounded-full transition">
                    <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/><path fill="#34A853" d="M1 12c0 1.78.43 3.45 1.18 4.93l2.85-2.22-.81-.62C4.01 13.75 3.88 13.05 3.88 12s.13-1.75.35-2.09l2.85-2.22C6.31 6.14 5.88 4.47 5.88 2.69z" opacity="0"/></svg>
                    Sign in with Google
                </button>
            </div>

            <!-- Link ke Register -->
            <p class="text-center text-sm text-gray-600 mt-8">
                New here? <a href="{{ route('register') }}" class="text-[#6D28D9] hover:underline">Create account</a>
            </p>
        </div>
    </div>
</body>

</html>