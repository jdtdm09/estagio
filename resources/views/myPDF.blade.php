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
        <div class="qrcode" style="display: flex; justify-content: center; align-items: center; height: 100vh; text-align: center;">
            QrCode para a entrada no Evento.
            </br>
            </br>
            <div style="position: absolute; top: 36%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                {!! DNS2D::getBarcodeHTML("$qrcode", 'QRCODE') !!}
                PIN: {{ $pin }}
            </div>
        </div>
    </div>
</body>
</html>
