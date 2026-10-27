<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - NexxManage</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white h-screen flex overflow-hidden">

    <!-- KIRI: Area Putih dengan Gambar Memenuhi Setengah Layar -->
    <div class="hidden lg:flex lg:w-1/2 p-6 bg-white items-center justify-center h-screen">
        <!-- w-full dan h-full membuat gambar mengisi area dengan maksimal -->
        <div class="relative w-full h-full rounded-[2.5rem] overflow-hidden">
            <img src="{{ asset('images/landingpage.jpg') }}" class="absolute inset-0 w-full h-full object-cover"
                alt="Abstract Background">
        </div>
    </div>

    <!-- KANAN: Form Register -->
    <div class="w-full lg:w-1/2 flex items-center justify-center px-8 sm:px-12 py-10 overflow-y-auto">
        <div class="w-full max-w-md">
            <!-- Logo -->
            <div class="flex justify-center mb-2">
                <h1 class="text-2xl font-bold text-gray-900 flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12 h-12 mr-1 object-contain">
                    NexxManage.
                </h1>
            </div>

            <h2 class="text-5xl font-bold text-center text-gray-900 mb-2">Create new account</h2>
            <p class="text-center text-gray-500 mb-[100px]">Already have an account? <a href="{{ route('login') }}"
                    class="text-[#6D28D9] hover:underline">Login</a></p>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full border-0 border-b-2 border-gray-300 focus:border-[#6D28D9] focus:ring-0 px-0 py-2 text-gray-900 bg-transparent placeholder-gray-400"
                        placeholder="Enter your full name">
                    @if ($errors->has('name'))
                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('name') }}</p>
                    @endif
                </div>

 <!-- Company Name -->
                <div>
                    <label for="company_name" class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
                    <input id="company_name" type="text" name="company_name" value="{{ old('company_name') }}" required
                        class="w-full border-0 border-b-2 border-gray-300 focus:border-[#6D28D9] focus:ring-0 px-0 py-2 text-gray-900 bg-transparent placeholder-gray-400"
                        placeholder="Enter your company name">
                    @if ($errors->has('company_name'))
                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('company_name') }}</p>
                    @endif
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
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
                        placeholder="Create a password">
                    @if ($errors->has('password'))
                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm
                        Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full border-0 border-b-2 border-gray-300 focus:border-[#6D28D9] focus:ring-0 px-0 py-2 text-gray-900 bg-transparent placeholder-gray-400"
                        placeholder="Confirm your password">
                </div>

                <!-- I Agree Checkbox -->
                <div class="flex items-center mt-2">
                    <input id="terms" name="terms" type="checkbox" required
                        class="w-4 h-4 text-[#6D28D9] bg-gray-100 border-gray-300 rounded focus:ring-[#6D28D9] focus:ring-2">
                    <label for="terms" class="ml-2 text-sm text-gray-700">
                        I agree to the <a href="#" class="text-[#6D28D9] hover:underline">Terms of Service</a> and
                        <a href="#" class="text-[#6D28D9] hover:underline">Privacy Policy</a>
                    </label>
                </div>

                <!-- Tombol Register -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-[#2D1B69] hover:bg-[#1A0F3D] text-white font-medium py-3 rounded-full transition">
                        Create Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
