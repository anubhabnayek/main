<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="image/174881.png">
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
    
    <form action="" method="">
    <table align="center" height=60px  collspan >
        <div>
       <tr><td><p><b>Step 1:Your details</b></p></td></tr>
            <tr>
            <td>Name</td>
            <td><input type="text" name="name" placeholder="First and last name" required size="50"></td>
            </tr>
            

            <tr> <td>&nbsp;</td> </tr>
            <tr>
            <td>Email</td>
            <td><input type="email" name="email" placeholder="example@domain.com" required size="50"></td>
            </tr>
            <tr> <td>&nbsp;</td>  </tr>

            <tr>
            <td>Phone</td>
            <td><input type="tel" name="phone" placeholder="Eg. +655400000000" required size="50"></td>
            </tr>
            <tr> <td>&nbsp;</td> </tr>
          </div><div>
            <tr><td><p>Step 2: Delivery address</p></td></tr>

            <tr>
            <td>Address</td>
            <td><textarea name="address" id="address" row="4" col="50" ></textarea></td>
            </tr>
            <tr> <td>&nbsp;</td> </tr>
            
            <tr>
            <td>Post code</td>
            <td><input type="number" name="postcode" required size="50"></td>
            </tr>
            <tr><td>&nbsp;</td></tr>

            <tr>
            <td>Country</td>
            <td><input type="text" name="country" required size="50"></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
</div><div>
            <tr><td><p>Step 3: card details</p></td></tr>

            <tr>
            <td>Card type</td>
            <td>
            <input type="radio" name="cardtype" value="visa"><img src="image/Visadebitcardpng-1599584312349.png"hight=20px width=20px><b>&nbsp</b>VISA 
            <input type="radio" name="cardtype" value="AmEx"><img src="image/41261786-3d9fbf88-6d92-11e8-9c64-46f9ce91611a.png"hight=20px width=20px><b>&nbsp</b> AmEx
            <input type="radio" name="cardtype" value="Mastercard"><img src="image/MasterCard_early_1990s_logo.svg.png"hight=20px width=20px><b>&nbsp</b>Mastercard
            </td>            
            </tr>
            <tr> <td>&nbsp;</td> </tr>

            <tr>
                <td>Card number</td>
                <td><input type="number" name="Card_number" required size="50"></td>
             </tr>
             <tr> <td>&nbsp;</td> </tr>
             <tr>
                <td>Security code</td>
                <td><input type="number" name="security_code" required size="50"></td>
              </tr>
              <tr> <td>&nbsp;</td> </tr>
              <td>Name on card</td>
                <td><input type="text" name="name_on_card" placeholder="Exact name as on the card" required size="50"></td>
            </tr>
            <tr> <td>&nbsp;</td> </tr>
            <td colspan="2" align="center">
            <input type="submit" name="submit"  value="BUY IT!">
            <input type="reset" value="Reset">
</td>
</tr>
</div>
</form>
</table>  
</body>
</html>