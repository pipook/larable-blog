
<!doctype html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel From Scratch Blog</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
        <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
        <style>
            html {
                scroll-behavior: smooth;
            }
        </style>
    </head>
    <body style="font-family: Open Sans, sans-serif;">
        <section class="px-6 py-8">
            <nav class="flex justify-between items-center">
                <div>
                    <a href="/">
                        <img src="/images/logo.svg" alt="Laracast Logo" width="165" height="16">
                    </a>
                </div>
                <div>
                    {{-- @guest
                        <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    @endguest --}}
                    @auth
                        <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</span>
                        <form action="/logout" method="POST" class="font-semibold inline px-6 text-blue-500 text-xs">
                            @csrf
                            <button type="submit">Log out</button>
                        </form>
                    @else
                        <a href="/register" class="text-xs font-bold uppercase hover:underline">Register</a>
                        <a href="/login" class="text-xs font-bold uppercase px-6 hover:underline">Log in</a>
                    @endauth
                    <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-6">Subscribe for Updates</a>
                </div>
            </nav>
            {{ $slot }}
            <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
                <img src="/images/lary-newsletter-icon.png" class="mx-auto" style="width: 145px;">
                <h5 class="text-3xl">Stay in touch with the latest posts</h5>
                <p class="text-sm">Promise to keep the inbox clean. No bugs.</p>

                <div class="mt-10">
                    <div class="relative inline-block mx-auto bg-gray-200 rounded-full">
                        <form method="POST" action="/newsletter" class="flex text-sm">
                            @csrf
                            <div class="py-3 px-5 inline-flex items-center">
                                <label for="email">
                                    <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                                </label>
                                <div>
                                    <input name="email" type="text" placeholder="Your email address" class="bg-transparent pl-4 focus-within:outline-none">
                                    @error('email')
                                        <span class="text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">Subscribe</button>
                        </form>
                    </div>
                </div>
            </footer>
        </section>
        <x-flash />
    </body>
</html>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app.css">
    <title>My blog</title>
</head>
<body>
    {{ $slot }}
</body>
</html> -->
