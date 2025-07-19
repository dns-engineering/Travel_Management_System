<?php
require_once('confi.php');

$id = $_GET['id'];
$query = "SELECT * FROM book WHERE id='$id'";
$result = mysqli_query($con, $query);

// Fetch persons details
$personsQuery = "SELECT * FROM book_details WHERE bookingID='$id'";
$personsResult = mysqli_query($con, $personsQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Booking Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2, h3 {
            text-align: center;
        }

        .receipt-info {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .receipt-info p {
            margin: 5px 0;
        }

        .receipt-info p strong {
            font-weight: bold;
            width: 150px;
            display: inline-block;
        }

        .total-price {
            text-align: right;
            margin-top: 20px;
            padding: 10px;
            background-color: #f0f7ff;
            border-radius: 5px;
        }

        .total-price p {
            margin: 5px 0;
            font-size: 18px;
        }

        .download-button {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .download-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
            font-weight: bold;
        }

        .download-button a:hover {
            background-color: #45a049;
        }

        .payment-section {
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .payment-options {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .payment-option {
            padding: 10px 20px;
            margin: 0 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-option.active {
            background-color: #2196F3;
            color: white;
        }

        .payment-option:hover:not(.active) {
            background-color: #f0f0f0;
        }

        .payment-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.05);
            display: none;
        }

        .payment-form h3 {
            margin-top: 0;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .payment-method-icon {
            text-align: center;
            margin-bottom: 15px;
        }

        .payment-button {
            background-color: #2196F3;
            color: white;
            border: none;
            padding: 12px 20px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .payment-button:hover {
            background-color: #0b7dda;
        }

        .payment-summary {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .payment-summary h4 {
            margin-top: 0;
            text-align: center;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .summary-item span:first-child {
            font-weight: bold;
        }

        .payment-success {
            color: #28a745;
            font-weight: bold;
            margin-top: 15px;
            display: none;
        }

        .payment-error {
            color: #dc3545;
            font-weight: bold;
            margin-top: 15px;
            display: none;
        }

        .payment-loading {
            text-align: center;
            margin-top: 15px;
            display: none;
        }

        .upi-details {
            margin-top: 15px;
            padding: 10px;
            background-color: #f0f7ff;
            border-radius: 4px;
        }

        .upi-qr-code {
            width: 150px;
            height: 150px;
            background-color: #eee;
            margin: 10px auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <h1>TOUR BOOKING RECEIPT</h1>
        <div class="receipt-info">
            <p><strong>Booking ID:</strong> <?php echo $row['id']; ?></p>
            <p><strong>Date:</strong> <?php echo $row['bookingdate']; ?></p>
        </div>
        <div class="receipt-info">
            <h2>Customer Details:</h2>
            <p><strong>Name:</strong> <?php echo $row['person1']; ?></p>
            <p><strong>Phone No:</strong> +91<?php echo $row['phone']; ?></p>
            <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
        </div>
        <div class="receipt-info">
            <h2>Tour Details:</h2>
            <p><strong>Tour Name:</strong> <?php echo $row['tourname']; ?></p>
            <p><strong>Tour Date:</strong> <?php echo $row['tourdate']; ?></p>
            <p><strong>Tour Duration:</strong> <?php echo $row['tourduration']; ?></p>
            <p><strong>Number of Persons:</strong> <?php echo $row['noofpeople']; ?></p>
        </div>
        <div class="receipt-info">
    <h2>Persons Details:</h2>
    <?php 
    $count = 1;
    while ($person = mysqli_fetch_assoc($personsResult)) : 
    ?>
    <h3>Person <?php echo $count; ?>:</h3>
    <p><strong>Name:</strong> <?php echo $person['personName']; ?></p>
    <p><strong>Age:</strong> <?php echo $person['personAge']; ?></p>
    <p><strong>Gender:</strong> <?php echo $person['personGender']; ?></p>
    <hr> <!-- Adds a visual separator -->
    <?php 
    $count++;
    endwhile; 
    ?>
</div>

        <div class="total-price">
            <h2>Total Price :</h2>
            
            <p><strong>Total Price:</strong> rs.<?php echo $row['totalPrice']; ?></p>
        </div>

        
        <div class="payment-section" id="paymentSection">
            <h2>Choose Payment Method</h2>
            <div class="payment-options">
                <div class="payment-option" onclick="showPaymentForm('card')">
                    <img src="https://cdn-icons-png.flaticon.com/512/3018/3018427.png" alt="Credit Card" width="30" height="30">
                    Credit/Debit Card
                </div>
                <div class="payment-option" onclick="showPaymentForm('paypal')">
                    <img src="https://cdn-icons-png.flaticon.com/512/3018/3018427.png" alt="PayPal" width="30" height="30">
                    PayPal
                </div>
                <div class="payment-option" onclick="showPaymentForm('upi')">
                    <img src="https://cdn-icons-png.flaticon.com/512/3018/3018427.png" alt="UPI" width="30" height="30">
                    UPI
                </div>
                <div class="payment-option" onclick="showPaymentForm('netbanking')">
                    <img src="https://cdn-icons-png.flaticon.com/512/3018/3018427.png" alt="Net Banking" width="30" height="30">
                    Net Banking
                </div>
            </div>
            
            <div id="cardForm" class="payment-form">
                <div class="payment-method-icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/3018/3018427.png" alt="Credit Card" width="50" height="50">
                </div>
                <h3>Credit/Debit Card Payment</h3>
                <div class="form-group">
                    <label for="cardNumber">Card Number</label>
                    <input type="text" id="cardNumber" placeholder="XXXX XXXX XXXX XXXX" required>
                </div>
                <div class="form-group">
                    <label for="cardName">Cardholder Name</label>
                    <input type="text" id="cardName" placeholder="John Doe" required>
                </div>
                <div class="form-group" style="display: flex; gap: 10px;">
                    <div style="flex: 1;">
                        <label for="expiryDate">Expiry Date</label>
                        <input type="text" id="expiryDate" placeholder="MM/YY" required>
                    </div>
                    <div style="width: 100px;">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" placeholder="XXX" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cardType">Card Type</label>
                    <select id="cardType" required>
                        <option value="">Select Card Type</option>
                        <option value="visa">Visa</option>
                        <option value="mastercard">MasterCard</option>
                        <option value="amex">American Express</option>
                        <option value="rupay">RuPay</option>
                    </select>
                </div>
                <div class="payment-summary">
                    <h4>Payment Summary</h4>
                    <div class="summary-item">
                        <span>Total Amount</span>
                        <span>rs.<?php echo $row['totalPrice']; ?></span>
                    </div>
                    <div class="summary-item">
                        <span>Payment Method</span>
                        <span>Credit/Debit Card</span>
                    </div>
                </div>
                <button type="button" class="payment-button" onclick="processPayment('card')">Pay Now</button>
                <div class="payment-loading" id="cardLoading">
                    <img src="https://cdn-icons-png.flaticon.com/512/3018/3018427.png" alt="Loading" width="30" height="30">
                    Processing payment...
                </div>
                <div class="payment-success" id="cardSuccess">Payment successful! Thank you for your payment.</div>
                <div class="payment-error" id="cardError">Payment failed. Please try again.</div>
            </div>
            
            <div id="paypalForm" class="payment-form">
                <div class="payment-method-icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/3018/3018427.png" alt="PayPal" width="50" height="50">
                </div>
                <h3>PayPal Payment</h3>
                <div class="form-group">
                    <label for="paypalEmail">PayPal Email</label>
                    <input type="email" id="paypalEmail" placeholder="youremail@example.com" required>
                </div>
                <div class="form-group">
                    <label for="paypalPassword">PayPal Password</label>
                    <input type="password" id="paypalPassword" placeholder="********" required>
                </div>
                <div class="payment-summary">
                    <h4>Payment Summary</h4>
                    <div class="summary-item">
                        <span>Total Amount</span>
                        <span>rs.<?php echo $row['totalPrice']; ?></span>
                    </div>
                    <div class="summary-item">
                        <span>Payment Method</span>
                        <span>PayPal</span>
                    </div>
                </div>
                <button type="button" class="payment-button" onclick="processPayment('paypal')">Pay Now</button>
                <div class="payment-loading" id="paypalLoading">
                    <img src="https://cdn-icons-png.flaticon.com/512/3018/3018427.png" alt="Loading" width="30" height="30">
                    Processing payment...
                </div>
                <div class="payment-success" id="paypalSuccess">Payment successful! Thank you for your payment.</div>
                <div class="payment-error" id="paypalError">Payment failed. Please try again.</div>
            </div>
            
            <div id="upiForm" class="payment-form">
                <div class="payment-method-icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/3018/3018427.png" alt="UPI" width="50" height="50">
                </div>
                <h3>UPI Payment</h3>
                <div class="form-group">
                    <label for="upiId">UPI ID</label>
                    <input type="text" id="upiId" placeholder="yourupi@xxx" required>
                </div>
                <div class="form-group">
                    <label for="upiPin">UPI PIN</label>
                    <input type="password" id="upiPin" placeholder="******" required>
                </div>
                <div class="upi-details">
                    <p>Scan this QR code with your UPI app:</p>
                    <div class="upi-qr-code">
                         <img src="https://th.bing.com/th/id/OIP.NQpTvhjVewfvArq8J3wXqQHaHa?w=180&h=180&c=7&r=0&o=5&pid=1.7" alt="">
                    </div>
                </div>
                <div class="payment-summary">
                    <h4>Payment Summary</h4>
                    <div class="summary-item">
                        <span>Total Amount</span>
                        <span>rs.<?php echo $row['totalPrice']; ?></span>
                    </div>
                    <div class="summary-item">
                        <span>Payment Method</span>
                        <span>UPI</span>
                    </div>
                </div>
                <button type="button" class="payment-button" onclick="processPayment('upi')">Pay Now</button>
                <div class="payment-loading" id="upiLoading">
                    <img src="https://cdn-icons-png.flaticon.com/512/3018/3018427.png" alt="Loading" width="30" height="30">
                    Processing payment...
                </div>
                <div class="payment-success" id="upiSuccess">Payment successful! Thank you for your payment.</div>
                <div class="payment-error" id="upiError">Payment failed. Please try again.</div>
            </div>
            
            <div id="netbankingForm" class="payment-form">
                <div class="payment-method-icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/3018/3018427.png" alt="Net Banking" width="50" height="50">
                </div>
                <h3>Net Banking Payment</h3>
                <div class="form-group">
                    <label for="bankSelect">Select Bank</label>
                    <select id="bankSelect" required>
                        <option value="">Select Bank</option>
                        <option value="sbi">State Bank of India</option>
                        <option value="icici">ICICI Bank</option>
                        <option value="hdfc">HDFC Bank</option>
                        <option value="axis">Axis Bank</option>
                        <option value="other">Other Bank</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bankUsername">Username</label>
                    <input type="text" id="bankUsername" placeholder="Your username" required>
                </div>
                <div class="form-group">
                    <label for="bankPassword">Password</label>
                    <input type="password" id="bankPassword" placeholder="********" required>
                </div>
                <div class="payment-summary">
                    <h4>Payment Summary</h4>
                    <div class="summary-item">
                        <span>Total Amount</span>
                        <span>rs.<?php echo $row['totalPrice']; ?></span>
                    </div>
                    <div class="summary-item">
                        <span>Payment Method</span>
                        <span>Net Banking</span>
                    </div>
                </div>
                <button type="button" class="payment-button" onclick="processPayment('netbanking')">Pay Now</button>
                <div class="payment-loading" id="netbankingLoading">
                    <img src="https://cdn-icons-png.flaticon.com/512/3018/3018427.png" alt="Loading" width="30" height="30">
                    Processing payment...
                </div>
                <div class="payment-success" id="netbankingSuccess">Payment successful! Thank you for your payment.</div>
                <div class="payment-error" id="netbankingError">Payment failed. Please try again.</div>
            </div>
        </div>
        <input type="hidden" id="paymentStatus" value="pending">
        <div class="download-button">
            <a href="javascript:window.print()" id="downloadReceipt" download="tour_receipt.html">Download Receipt</a>
            
        </div>

        <p>Thank you for choosing our services. For any inquiries or assistance, please contact us at <a href="mailto:explorerxpro@gmail.com">explorerxpro@gmail.com</a></p>
        <?php endwhile; ?>
    </div>

    <script>
        function showPaymentOptions() {
            document.getElementById('paymentSection').style.display = 'block';
        }

        function showPaymentForm(method) {
            // Hide all payment forms
            document.getElementById('cardForm').style.display = 'none';
            document.getElementById('paypalForm').style.display = 'none';
            document.getElementById('upiForm').style.display = 'none';
            document.getElementById('netbankingForm').style.display = 'none';
            
            // Remove active class from all options
            const options = document.getElementsByClassName('payment-option');
            for (let i = 0; i < options.length; i++) {
                options[i].classList.remove('active');
            }
            
            // Show selected payment form
            document.getElementById(method + 'Form').style.display = 'block';
            
            // Add active class to selected option
            event.target.classList.add('active');
        }

        function processPayment(method) {
    // Hide all success and error messages, show loading
    document.getElementById(method + 'Success').style.display = 'none';
    document.getElementById(method + 'Error').style.display = 'none';
    document.getElementById(method + 'Loading').style.display = 'block';
    
    // Basic validation
    let isValid = true;
    let errorMessage = '';
    
    switch(method) {
        case 'card':
            if(document.getElementById('cardNumber').value === '' ||
               document.getElementById('cardName').value === '' ||
               document.getElementById('expiryDate').value === '' ||
               document.getElementById('cvv').value === '' ||
               document.getElementById('cardType').value === '') {
                isValid = false;
                errorMessage = 'Please fill in all card details';
            }
            break;
        case 'paypal':
            if(document.getElementById('paypalEmail').value === '' ||
               document.getElementById('paypalPassword').value === '') {
                isValid = false;
                errorMessage = 'Please enter your PayPal email and password';
            }
            break;
        case 'upi':
            if(document.getElementById('upiId').value === '' ||
               document.getElementById('upiPin').value === '') {
                isValid = false;
                errorMessage = 'Please enter your UPI ID and PIN';
            }
            break;
        case 'netbanking':
            if(document.getElementById('bankSelect').value === '' ||
               document.getElementById('bankUsername').value === '' ||
               document.getElementById('bankPassword').value === '') {
                isValid = false;
                errorMessage = 'Please select bank and enter username/password';
            }
            break;
    }
    
    if (!isValid) {
        document.getElementById(method + 'Loading').style.display = 'none';
        document.getElementById(method + 'Error').textContent = errorMessage;
        document.getElementById(method + 'Error').style.display = 'block';
        return;
    }
    
    // Simulate payment processing
    setTimeout(function() {
        // Randomly decide payment success (for demonstration)
        if (Math.random() > 0.3) {
            document.getElementById(method + 'Loading').style.display = 'none';
            document.getElementById(method + 'Success').style.display = 'block';
            
            // Update payment status to success
            document.getElementById('paymentStatus').value = 'success';
        } else {
            document.getElementById(method + 'Loading').style.display = 'none';
            document.getElementById(method + 'Error').textContent = 'Payment failed. Please try again.';
            document.getElementById(method + 'Error').style.display = 'block';
        }
        
        // In a real application, you would make an AJAX call to your server here
        // Example:
        /*
        fetch('/process-payment', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                method: method,
                amount: '<?php echo $row['totalPrice']; ?>',
                // Include other relevant payment details
            })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById(method + 'Loading').style.display = 'none';
            if (data.success) {
                document.getElementById(method + 'Success').style.display = 'block';
                document.getElementById('paymentStatus').value = 'success'; // Update payment status
            } else {
                document.getElementById(method + 'Error').textContent = data.message || 'Payment failed. Please try again.';
                document.getElementById(method + 'Error').style.display = 'block';
            }
        })
        .catch(error => {
            document.getElementById(method + 'Loading').style.display = 'none';
            document.getElementById(method + 'Error').textContent = 'An error occurred. Please try again.';
            document.getElementById(method + 'Error').style.display = 'block';
        });
        */
    }, 2000);
}
        // Check payment status before allowing download
document.getElementById('downloadReceipt').addEventListener('click', function(e) {
    const paymentStatus = document.getElementById('paymentStatus').value;
    
    if (paymentStatus !== 'success') {
        e.preventDefault();
        alert('Please complete the payment before downloading the receipt.');
    } else {
        // Allow download
        window.print();
    }
});
    </script>
</body>
</html>