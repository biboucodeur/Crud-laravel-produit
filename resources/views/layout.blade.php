<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="bg-gray-100 p-6">
    <div class="container mx-auto">

        <div class="max-w-screen-sm mx-auto">
            @if(session('success'))
            <div id="success-message" class="bg-green-500 text-white text-center px-4 py-2 mb-4 rounded max-w-screen-sm">
                {{ session('success') }}
            </div>
            @endif

            @if ($errors->any())
            <div id="error-message" class="bg-red-500 text-white text-center px-4 py-2 mb-4 rounded max-w-screen-sm ">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        @yield('content')
    </div>

    <script>
        // Disparition automatique des messages après 2 secondes
        setTimeout(() => {
            let successMessage = document.getElementById('success-message');
            let errorMessage = document.getElementById('error-message');

            if (successMessage) {
                successMessage.style.transition = "opacity 0.5s";
                successMessage.style.opacity = "0";
                setTimeout(() => successMessage.remove(), 500);
            }

            if (errorMessage) {
                errorMessage.style.transition = "opacity 0.5s";
                errorMessage.style.opacity = "0";
                setTimeout(() => errorMessage.remove(), 500);
            }
        }, 2000); // 2 secondes
    </script>
</body>



</html>