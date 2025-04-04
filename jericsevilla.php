<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Order Calculator</title>
     <style>
         .item { margin-bottom: 10px; }
         table {
             width: 50%;
             border-collapse: collapse;
             margin: 20px auto;
             font-size: 18px;
             text-align: center;
             background-color: rgb(25, 182, 190);
         }
 
 body { font-family: sans-serif; }
         label { display: block; margin-bottom: 5px; }
         input, select { width: 100%; padding: 8px; margin-bottom: 10px; }
         button { background-color: #4CAF50; color: white; padding: 10px; border: none; cursor: pointer; }
         #result { margin-top: 20px; font-weight: bold; }
     
 body {
     font-family: sans-serif;
     background-color: lightblue;
 }
 .container {
     width: 500px;
     height: 500pxt;
     margin: 0 auto;
     padding: 20px;
     border: 1px solid #17100f;
     border-radius: 5px;
     shadow: 50px;
     background-color:lightgreen;
     box-shadow: 0 0 10px rgba(1, 1, 1, 1.1);
 }
 h1 {
     text-align: center;
    
 }
 label {
     display: block;
     margin-bottom: 10px;
 }
 
 input[type="number"] {
     width: 25%;
     padding: 8px;
     margin-bottom: 10px;
     border: 1px solid #201a18;
     box-sizing: border-box;
 }
 select {
     width: 100%;
     padding: 8px;
     margin-bottom: 10px;
     border: 1px solid #ccc;
     box-sizing: border-box;
 }
 input[type="radio"] {
     margin-right: 5px;
 }
 button {
     background-color: #4CAF50;
     color: white;
     padding: 10px 15px;
     border: none;
     cursor: pointer;
 }
 #result {
     margin-top: 20px;
     font-weight: bold;
     text-align: center;
 }
     </style>
 </head>
 <body>
 <table>
         <tr>
             <th>Menu</th>
             <th>Order</th>
             <th>Unit Price</th>
         </tr>
         <td><img src="https://cdn.loveandlemons.com/wp-content/uploads/2025/01/pancake-recipe.jpg" width="100" /></td>
         <td>Pancakes</td>
         <td> $1.00</td>
     </tr>
     <tr>
         <td><img src="https://cdn.britannica.com/38/230838-050-D0173E79/doughnuts-donuts.jpg" width="100"/></td>
         <td>Donut</td>
         <td> $1.50</td>
     </tr>
     <tr>
         <td><img src="https://www.allrecipes.com/thmb/0xH8n2D4cC97t7mcC7eT2SDZ0aE=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/6776_Pizza-Dough_ddmfs_2x1_1725-fdaa76496da045b3bdaadcec6d4c5398.jpg" width="100" /></td>
         <td>Pizza</td>
         <td> $2.75</td>
     </tr>
     <tr>
         <td><img src="https://www.dukeshill.co.uk/cdn/shop/articles/20240725081844-chicken-20bacon-20club-20sandwich-20main-20landscape.jpg?v=1724401314" width="100" /></td>
         <td>club sandwich</td>
         <td> $2.00</td>
     </tr>
     <tr>
         <td><img src="https://hips.hearstapps.com/hmg-prod/images/roast-chicken-recipe-2-66b231ac9a8fb.jpg?crop=0.8888888888888888xw:1xh;center,top&resize=1200:*" width="100" /></td>
         <td>roast chicken</td>
         <td> $4.50</td>
     </table>
     <div class="container"><h1>Customer Order</h1>
         <form method="POST" action="">
             <label for="item">Select Order:</label><br>
             <input type="radio" name="item" value="Pancakes" required> Pancakes ($1.00) <br>
             <input type="radio" name="item" value="Donut"> Donut ($1.50)<br>
             <input type="radio" name="item" value="Pizza"> Pizza ($2.75)<br>
             <input type="radio" name="item" value="club sandwich"> club sandwich ($2.00)<br>
             <input type="radio" name="item" value="roast chicken"> roast chicken ($4.50)<br><br>
 <hr>
             <label for="quantity">Quantity:</label> <br>
             <input type="number" name="quantity" min="1" required><br><br>
 <hr>
             <label for="dine_option">Dine In or Take Out:</label><br>
             <input type="radio" name="dine_option" value="Dine In" required> Dine In<br>
             <input type="radio" name="dine_option" value="Take Out"> Take Out<br><br>
 
             <button type="submit" name="submit">Calculate</button>
         </form>
 <hr>
         <?php
         if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            
             function getSelectedItem($order) {
                 return htmlspecialchars($order);
             }
 
             
             function getPrice($order) {
                 $prices = [
                     "Pancakes" => 1.00,
                     "Donut" => 1.50,
                     "Pizza" => 2.75,
                     "club sandwich" => 2.00,
                     "roast chicken" => 4.50
                 ];
                 return $prices[$order] ?? 0;
             }
 
            
             function calculateTax($amount, $dineOption) {
                 if ($dineOption === "Take Out") {
                     return $amount * 0.12;
                 }
                 return 0;
             }
 
            
             function calculateTotal($price, $quantity, $tax) {
                 return ($price * $quantity) + $tax;
             }
 
             
             $order = getSelectedItem($_POST['item']);
             $quantity = (int)$_POST['quantity'];
             $dineOption = htmlspecialchars($_POST['dine_option']);
 
             
             $price = getPrice($order);
             $subtotal = $price * $quantity;
             $tax = calculateTax($subtotal, $dineOption);
             $total = calculateTotal($price, $quantity, $tax);
 
             echo "<div class='result'>";
             echo "<h2>Order Summary</h2>";
             echo "<p><strong>Order:</strong> $order</p>";
             echo "<p><strong>Quantity:</strong> $quantity</p>";
             echo "<p><strong>Dine Option:</strong> $dineOption</p>";
             echo "<p><strong>Subtotal:</strong> $" . number_format($subtotal, 2) . "</p>";
             echo "<p><strong>Tax:</strong> $" . number_format($tax, 2) . "</p>";
             echo "<p><strong>Total Amount Due:</strong> $" . number_format($total, 2) . "</p>";
             echo "</div>";
         }
         ?>
     </div>
 </body>
 </html>