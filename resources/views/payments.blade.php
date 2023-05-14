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
<div id="paypal-form" style="max-width: 400px; margin: 0 auto; background-color: #f9f9f9; border: 1px solid #ccc; padding: 20px; font-family: Arial, sans-serif;">
    <h2 style="text-align: center; color: #333;">PayPal</h2>
    <form method="POST" action="/processar-pagamento-paypal" style="margin-top: 20px;">
        <div style="margin-bottom: 15px;">
            <label for="paypal-email" style="display: block; font-weight: bold; color: #333;">Endereço de E-mail do PayPal:</label>
            <input type="email" id="paypal-email" name="paypal_email" required style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="text-align: center;">
            <button type="button" onclick="redirectToPayment()" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px;">Efetuar Pagamento</button>
        </div>
    </form>
</div>
<?php endif; ?>

<!-- Display the appropriate section based on the value of the "metodo" parameter -->
<?php if ($showMBSection): ?>
<div id="credit-card-form" style="max-width: 400px; margin: 0 auto; background-color: #f9f9f9; border: 1px solid #ccc; padding: 20px; font-family: Arial, sans-serif;">
    <h2 style="text-align: center; color: #333;">Cartão de Crédito</h2>
    <form method="POST" action="/processar-pagamento-cartao" style="margin-top: 20px;">
        <div style="margin-bottom: 15px;">
            <label for="cardholder-name" style="display: block; font-weight: bold; color: #333;">Nome do Titular do Cartão:</label>
            <input type="text" id="cardholder-name" name="cardholder_name" required style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="card-number" style="display: block; font-weight: bold; color: #333;">Número do Cartão:</label>
            <input type="text" id="card-number" name="card_number" required style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="expiration-date" style="display: block; font-weight: bold; color: #333;">Data de Validade:</label>
            <input type="text" id="expiration-date" name="expiration_date" placeholder="MM/AAAA" required style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="cvv" style="display: block; font-weight: bold; color: #333;">CVV:</label>
            <input type="text" id="cvv" name="cvv" required style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="text-align: center;">
            <button type="button" onclick="redirectToPayment()" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px;">Efetuar Pagamento</button>
        </div>
    </form>
</div>
<?php endif; ?>

<?php if ($showMbWaySection): ?>
<div id="mbway-form" style="max-width: 400px; margin: 0 auto; background-color: #f9f9f9; border: 1px solid #ccc; padding: 20px; font-family: Arial, sans-serif;">
    <h2 style="text-align: center; color: #333;">MBWay</h2>
    <form method="POST" action="/processar-pagamento-mbway" style="margin-top: 20px;">
        <div style="margin-bottom: 15px;">
            <label for="mbway-phone" style="display: block; font-weight: bold; color: #333;">Número de Telemóvel:</label>
            <input type="text" id="mbway-phone" name="mbway_phone" required style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="text-align: center;">
            <button type="button" onclick="redirectToPayment()" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px;">Efetuar Pagamento</button>
        </div>
    </form>
</div>
<?php endif; ?>
