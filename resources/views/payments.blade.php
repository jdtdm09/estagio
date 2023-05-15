<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://kit.fontawesome.com/bdbff2d269.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('bootstrap\js\bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">

    <title>Pagamento</title>

<?php
// Retrieve the value of the "metodo" parameter from the URL
$metodo = isset($_GET['metodo']) ? $_GET['metodo'] : null;

// Set variables to determine which section to show
$showMbWaySection = false;
$showPaypalSection = false;
$showMBSection = false;

if ($metodo === 'mbway') {
    $showMbWaySection = true;
} elseif ($metodo === 'paypal') {
    $showPaypalSection = true;
} elseif ($metodo === 'cartao_credito') {
    $showMBSection = true;
} else {
  //handle function later lol
}
?>


<?php if ($showPaypalSection): ?>
<div id="paypal-form" style="max-width: 400px; margin: 0 auto; padding: 20px; text-align: center; background-color: #fff; border: 1px solid #ddd; border-radius: 4px; box-shadow: 0 0 10px rgba(0,0,0,.1);">
    <img src="data:image/png;base64,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" alt="Logo PayPal" width="140">
    <form method="POST" action="/processar-pagamento-paypal">
        <div style="margin-bottom: 20px;">
            <label for="paypal-email">Endereço de E-mail do PayPal:</label>
            <input type="email" id="paypal-email" name="paypal_email" required style="padding: 10px; width: 100%; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <div>
            <button type="button" onclick="redirectToPayment()" style="background-color: #4e73df; color: #fff; border: none; border-radius: 4px; padding: 10px 20px; cursor: pointer;">Efetuar Pagamento</button>
        </div>
    </form>
</div>
<?php endif; ?>

<!-- Display the appropriate section based on the value of the "metodo" parameter -->
<?php if ($showMBSection): ?>
<div id="credit-card-form" style="max-width: 400px; margin: 0 auto; padding: 20px; text-align: center; background-color: #fff; border: 1px solid #ddd; border-radius: 4px; box-shadow: 0 0 10px rgba(0,0,0,.1);">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Multibanco.svg/1200px-Multibanco.svg.png" alt="Logo Multibanco" width="65">
    <form method="POST" action="/processar-pagamento-cartao">
        <div style="margin-bottom: 20px;">
            <label for="cardholder-name">Nome do Titular do Cartão:</label>
            <input type="text" id="cardholder-name" name="cardholder_name" required style="padding: 10px; width: 100%; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 20px;">
            <label for="card-number">Número do Cartão:</label>
            <input type="text" id="card-number" name="card_number" required style="padding: 10px; width: 100%; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 20px;">
            <label for="expiration-date">Data de Validade:</label>
            <input type="text" id="expiration-date" name="expiration_date" placeholder="MM/AAAA" required style="padding: 10px; width: 100%; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 20px;">
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required style="padding: 10px; width: 100%; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <div>
            <button type="button" onclick="redirectToPayment()" style="background-color: #4e73df; color: #fff; border: none; border-radius: 4px; padding: 10px 20px; cursor: pointer;">Efetuar Pagamento</button>
        </div>
    </form>    
</div>  
<?php endif; ?>

<?php if ($showMbWaySection): ?>
<div id="mbway-form" style="max-width: 400px; margin: 0 auto; padding: 20px; text-align: center; background-color: #fff; border: 1px solid #ddd; border-radius: 4px; box-shadow: 0 0 10px rgba(0,0,0,.1);">
    <img src="data:image/png;base64,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" width="120">
    <form method="POST" action="/processar-pagamento-mbway">
        <div style="margin-bottom: 20px;">
            <label for="mbway-phone">Número de Telemóvel:</label>
            <input type="text" id="mbway-phone" name="mbway_phone" required style="padding: 10px; width: 100%; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <div>
            <button type="button" onclick="redirectToPayment()" style="background-color: #4e73df; color: #fff; border: none; border-radius: 4px; padding: 10px 20px; cursor: pointer;">Efetuar Pagamento</button>
        </div>
    </form>
</div>
<?php endif; ?>
