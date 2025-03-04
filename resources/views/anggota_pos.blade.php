<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel + Vue</title>
    @vite(['../resources/js/app.js'])
</head>
<body>
    <div id="app">
        <!-- Vue component akan di-mount di sini -->
        <anggota-pos>Halo</anggota-pos>
    </div>
    <script src="{{ mix('js/app.js') }}"></script> <!-- Laravel Mix untuk bundling Vue -->
</body>
</html>
