<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Web</title>
    @vite("resources/css/app.css")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <x-sidebar>
            {{ $slot }}
        </x-sidebar>

        <!-- Main content -->
        <main class="main-content">
            
            
            {{ $slot }}
            
            <div class="divider"></div>
            
        </main>
    </div>
</body>
</html>