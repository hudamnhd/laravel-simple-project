<!-- layouts/master.blade.php -->
<!DOCTYPE html>
<html>

    <head>
        <title>@yield('title', 'My Website')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @yield('styles')
    </head>

    <body>
        @include('components.loading')
        @yield('content')
        <script>
            // state loading page
            document.onreadystatechange = function() {
                if (document.readyState !== "complete") {
                    document.querySelector("body").style.visibility = "hidden";
                    document.getElementById("loading-overlay").style.visibility = "visible";
                } else {
                    document.getElementById("loading-overlay").style.display = "none";
                    document.querySelector("body").style.visibility = "visible";
                }
            };
            document.addEventListener("DOMContentLoaded", function() {
                const message = document.querySelector(".message");
                if (message) {
                    setTimeout(() => {
                        message.style.display = "none";
                    }, 2000);
                }
            });
        </script>
    </body>

</html>
