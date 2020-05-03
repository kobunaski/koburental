<!DOCTYPE html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div id="paypal-button-container"></div>

<script
    src="https://www.paypal.com/sdk/js?client-id=AQ6ByKSqZI_j5-puUMB_2jJEeimr6jqj1_5C1fY74kfnslpGfHreGzlzmkhgEom4L79E-gRr5RzZw2yc"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
</script>
<script>
    paypal.Buttons({
        style: {
            size: 'small',
            shape: 'pill'
        },
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '2'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                alert('Transaction completed by ' + details.payer.name.given_name);
            });
        }
    }).render('#paypal-button-container');
    //This function displays Smart Payment Buttons on your web page.
</script>

</body>
</html>
