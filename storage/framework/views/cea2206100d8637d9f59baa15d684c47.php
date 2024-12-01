<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen">

    <!-- Top Navigation Bar -->
    <nav class="bg-green-800 text-white fixed top-0 left-0 w-full z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="#" class="text-lg font-bold">Logo</a>
            </div>
            <!-- Navbar Links -->
            <div class="hidden md:flex space-x-4">
                <a href="#accueil" class="hover:text-gray-400">Accueil</a>
                <a href="#actualites" class="hover:text-gray-400">Actualités Royales</a>
                <a href="#ministere" class="hover:text-gray-400">Ministère</a>
                <a href="#dossiers" class="hover:text-gray-400">Dossiers politiques</a>
                <a href="#politique" class="hover:text-gray-400">Politique étrangère</a>
                <a href="#evenements" class="hover:text-gray-400">Événements</a>
                <a href="#annuaire" class="hover:text-gray-400">Annuaire</a>
            </div>

            <!-- Register and Login Buttons -->
            <div class="flex space-x-4">
                <!-- Register Button -->
                <a href="<?php echo e(route('register')); ?>" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">
                    Register
                </a>

                <!-- Login Button -->
                <a href="<?php echo e(route('login')); ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Login
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Section -->
    <div class="h-screen flex justify-center items-center bg-cover bg-center" style="background-image: url('images/accueil.jpg');">
        <!-- If you want to overlay text on the image -->
        
    </div>


    <!-- Scrolling Content -->
    <div id="accueil" class="h-screen bg-gradient-to-b from-blue-500 to-green-300 flex justify-center items-center">
        <h2 class="text-3xl font-bold text-white">Accueil Section</h2>
    </div>

    <div id="actualites" class="h-screen bg-gradient-to-b from-green-300 to-yellow-500 flex justify-center items-center">
        <h2 class="text-3xl font-bold text-white">Actualités Royales</h2>
    </div>

    <div id="ministere" class="h-screen bg-gradient-to-b from-yellow-500 to-red-500 flex justify-center items-center">
        <h2 class="text-3xl font-bold text-white">Ministère</h2>
    </div>

    <div id="dossiers" class="h-screen bg-gradient-to-b from-red-500 to-purple-500 flex justify-center items-center">
        <h2 class="text-3xl font-bold text-white">Dossiers Politiques</h2>
    </div>

    <div id="politique" class="h-screen bg-gradient-to-b from-purple-500 to-indigo-500 flex justify-center items-center">
        <h2 class="text-3xl font-bold text-white">Politique Étrangère</h2>
    </div>

    <div id="evenements" class="h-screen bg-gradient-to-b from-indigo-500 to-blue-500 flex justify-center items-center">
        <h2 class="text-3xl font-bold text-white">ÉVÉNEMENTS</h2>
    </div>

    <div id="annuaire" class="h-screen bg-gradient-to-b from-blue-500 to-green-500 flex justify-center items-center">
        <h2 class="text-3xl font-bold text-white">Annuaire</h2>
    </div>

</body>
</html>
<?php /**PATH C:\Users\dell\Downloads\province-app\province-app\resources\views/welcome.blade.php ENDPATH**/ ?>