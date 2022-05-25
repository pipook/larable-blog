
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
                    <a href="/" class="text-xs font-bold uppercase">Home Page</a>
                    <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-6">Subscribe for Updates</a>
                </div>
            </nav>
            {{ $slot }}
            <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
                <img src="/images/lary-newsletter-icon.png" class="mx-auto" style="width: 145px;">
                <h5 class="text-3xl">Stay in touch with the latest posts</h5>
                <p class="text-sm">Promise to keep the inbox clean. No bugs.</p>

                <div class="mt-10">
                    <div class="relative inline-block mx-auto bg-gray-200 rounded-full">
                        <form method="POST" action="#" class="flex text-sm">
                            <div class="py-3 px-5 inline-flex items-center">
                                <label for="email">
                                    <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                                </label>
                                <input id="email" type="text" placeholder="Your email address" class="bg-transparent pl-4 focus-within:outline-none">
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
