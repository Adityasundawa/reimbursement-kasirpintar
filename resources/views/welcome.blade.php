<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        <button class="bg-red-500">Submit</button>
        <h5 class="result"></h5>
    </body>

    <script>
        let shareData = {
            title: "MDN",
            text: "Learn web development on MDN!",
            url: "https://developer.mozilla.org",
        };

        const resultPara = document.querySelector(".result");

        if (!navigator.canShare) {
            resultPara.textContent = "navigator.canShare() not supported.";
        } else if (navigator.canShare(shareData)) {
            const btn = document.querySelector("button");

            // Share must be triggered by "user activation"
            btn.addEventListener("click", async () => {
            try {
                await navigator.share(shareData);
                resultPara.textContent = "MDN shared successfully";
            } catch (err) {
                resultPara.textContent = `Error: ${err}`;
            }
            });
        } else {
            resultPara.textContent = "Specified data cannot be shared.";
        }
    </script>
</html>
