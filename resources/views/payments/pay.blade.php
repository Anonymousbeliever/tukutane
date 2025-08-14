<!DOCTYPE html>
<html>
<head>
    <title>Make Payment</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h2>STK Push Payment</h2>

    <form id="paymentForm">
        @csrf
        <label>Phone Number:</label><br>
       <input type="text" name="phone_number" value="254700000000" required><br><br>

        <label>Amount:</label><br>
        <input type="number" name="amount" value="1" required><br><br>

        <!-- Hidden payment_id -->
        <input type="hidden" name="payment_id" value="INV12345">

        <button type="submit">Pay Now</button>
    </form>

    <div id="response"></div>

    <script>
document.getElementById('paymentForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("{{ route('mpesa.stk_push') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById('response').innerHTML = "<pre>" + JSON.stringify(data, null, 2) + "</pre>";
    })
    .catch(err => {
        document.getElementById('response').innerHTML = "<pre>" + err + "</pre>";
    });
});
</script>

</body>
</html>
