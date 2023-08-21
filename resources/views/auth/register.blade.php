<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')

    {{-- Goggle Fonts Poppin --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- Fav Icon --}}
    <link rel="icon" href="{{ asset('images/logo.png') }}" />

    <style type="text/css">
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <div class="h-screen flex items-center justify-center">
        <div class="bg-gray-50 text-gray-500 rounded-xl shadow-2xl overflow-hidden flex" style="max-width: 1000px;">
            <div class="w-1/2 hidden md:block pt-60">
                <img src="{{ asset('images/park.svg') }}" class="" alt="register" />
            </div>

            <div class="w-full md:w-1/2 px-5 py-10">
                <div class="text-center mb-10">
                    <h1 class="font-bold text-3xl text-gray-700 tracking-wide">USER REGISTRATION</h1>
                </div>
                <x-session-message/>
                <div>
                    <form action="{{ route('user.register') }}" method="POST">
                        @csrf
                        <x-form-component formid="name" formlabel="Name" formtype="text" formname="name" formicon="user" formplaceholder="Enter Your Name" />
                        <x-form-component formid="email" formlabel="Email" formtype="email" formname="email" formicon="envelope" formplaceholder="Enter Your Email Address" />
                        
                        <div class="flex gap-3">
                            <x-form-component formid="password" formlabel="Password" formtype="password" formname="password" formicon="key" />
                            <x-form-component formid="confirm-password" formlabel="Confirm Password" formtype="password" formname="confirmpassword" formicon="key" />

                        </div>

                        <div class="">
                            <button type="submit" class="w-full bg-gray-500 text-white font-semibold py-3 rounded-md uppercase hover:bg-gray-600">Register</button>
                        </div>
                    </form>
                </div>
                <div class="text-center mt-6">
                    <p>Already have an account? Login <a href="{{ route('login') }}" class="text-gray-800">Here !</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>