<?php
include ('../config/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get transaction data from JavaScript and sanitize
    $transactionData = json_decode($_POST['transactionData'], true);

    // Check if data is valid and escape output
    if (isset($transactionData['customerStatus'], $transactionData['customerName'], $transactionData['subTotal'], 
              $transactionData['discount'], $transactionData['grandTotal'], $transactionData['paymentMethod'], 
              $transactionData['cashAmount'], $transactionData['changeAmount'], $transactionData['note'], 
              $transactionData['items']) 
        && is_array($transactionData['items'])) {

        // Sanitize the fields to prevent XSS
        $customerStatus = htmlspecialchars($transactionData['customerStatus']);
        $customerName = htmlspecialchars($transactionData['customerName']);
        $subTotal = htmlspecialchars($transactionData['subTotal']);
        $discount = htmlspecialchars($transactionData['discount']);
        $grandTotal = htmlspecialchars($transactionData['grandTotal']);
        $paymentMethod = htmlspecialchars($transactionData['paymentMethod']);
        $cashAmount = htmlspecialchars($transactionData['cashAmount']);
        $changeAmount = htmlspecialchars($transactionData['changeAmount']);
        $note = htmlspecialchars($transactionData['note']);

        // HTML structure for the receipt
        $receiptHtml = "<h2>Receipt</h2>";
        $receiptHtml .= "<p>Customer: $customerName</p>";
        $receiptHtml .= "<p>Status: $customerStatus</p>";
        $receiptHtml .= "<table border='1' cellpadding='5'>";
        $receiptHtml .= "<tr><th>Item</th><th>Price</th><th>Qty</th><th>Total</th></tr>";

        // Loop through the items and add them to the receipt
        foreach ($transactionData['items'] as $item) {
            $itemName = htmlspecialchars($item['itemName']);
            $price = htmlspecialchars($item['price']);
            $qty = htmlspecialchars($item['qty']);
            $total = htmlspecialchars($item['total']);
            $receiptHtml .= "<tr>
                                <td>$itemName</td>
                                <td>$price</td>
                                <td>$qty</td>
                                <td>$total</td>
                             </tr>";
        }

        $receiptHtml .= "</table>";
        $receiptHtml .= "<p>Sub Total: $subTotal</p>";
        $receiptHtml .= "<p>Discount: $discount</p>";
        $receiptHtml .= "<p>Grand Total: $grandTotal</p>";
        $receiptHtml .= "<p>Payment Method: $paymentMethod</p>";
        $receiptHtml .= "<p>Cash: $cashAmount</p>";
        $receiptHtml .= "<p>Change: $changeAmount</p>";
        $receiptHtml .= "<p>Note: $note</p>";

        // Return the HTML for the receipt
        echo $receiptHtml;
    } else {
        // Error if data is missing or invalid
        echo "Invalid data received.";
    }
}
?>
