<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ARSIP PENDIS - Sistem Arsip Surat Kementerian Agama</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gradient-to-b from-white via-[#f4fdf7] to-[#e0f2eb] text-gray-800">

  <header class="w-full py-6 px-4 md:px-12 bg-white shadow-sm">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <img src="{{ asset('img/logo.png') }}" class="h-10" alt="Logo Kementerian Agama">
      <a href="/admin/" class="bg-green-600 text-white px-6 py-2 rounded-xl text-sm font-semibold hover:bg-green-700 transition-all">Login</a>
    </div>
  </header>

  <main class="min-h-screen max-w-7xl mx-auto px-4 md:px-12 py-1 flex flex-col items-center justify-center text-center gap-12">
    <div class="mt-12">
      <img src="{{ asset('img/dirjen.jpg') }}" alt="Ilustrasi Arsip Digital" class="w-full max-w-2xl mx-auto rounded-lg shadow-lg">
    </div>
    <div class="space-y-8">
      <h2 class="text-3xl md:text-5xl font-bold text-green-800 leading-tight">
        Sistem Arsip Surat <br> Kementerian Agama
      </h2>
      <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
        Aplikasi modern untuk mengelola arsip surat masuk dan keluar secara efisien, terstruktur, dan mudah diakses oleh seluruh unit kerja Kementerian Agama.
      </p>
      <a href="/admin/" class="inline-block bg-green-700 hover:bg-green-800 text-white font-semibold px-8 py-4 rounded-full text-lg transition-all transform hover:scale-105">
        Get Started
      </a>
    </div>
  </main>

  <footer class="text-center text-sm py-8 text-gray-500 mt-16">
    © 2025 ARSIP PENDIS – Kementerian Agama. All rights reserved.
  </footer>

</body>
</html>
