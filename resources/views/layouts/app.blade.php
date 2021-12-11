<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Probation Test Ardana at Cikatech</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <livewire:styles/>
    <livewire:scripts/>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('content') }}">
                Probation Test for Backend Developer at Cikatech
            </a>
            <a class="navbar-brand" href="{{ route('form-deposit') }}">
                Form Deposit
            </a>
            <a class="navbar-brand" href="{{ route('deposit') }}">
                Deposit
            </a>
        </div>
    </nav>
    <main class="py-4">
        {{ $slot }}
    </main>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
