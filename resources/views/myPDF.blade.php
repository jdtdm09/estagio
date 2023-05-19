<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
        }

        .qrcode {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Isto é o bilhete para o evento: {{ $name }}</p>
        <div class="qrcode">
            Eventualmente isto vai ser um QR code.
            {{ $qrcode }}
        </div>
    </div>
</body>
</html>
