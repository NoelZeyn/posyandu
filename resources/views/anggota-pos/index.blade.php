<!-- resources/views/anggota-pos/index.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota Pos</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @vite(['../resources/js/app.js'])
</head>
<body>
    <div id="app">
        <anggota-pos></anggota-pos>
    </div>
</body>
</html>
