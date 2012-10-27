<h2>Purchase Auction Functionality</h2>
    <ul class="list_style_disc">
        <li>- Specify length of auction, minimum bid, and bid increments</li>
        <li>- Monitor bid activity</li>
        <li>- Any interested seeker can bid on your lease</li>
        <li>- $.10/acre, minimum $100</li>
    </ul>

    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="TPB9A26YJSPLJ">
        <input type="hidden" name="lc" value="US">
        <input type="hidden" name="item_name" value="Public Pasture Auction">
        <input type="hidden" name="custom" value="<?=$property['id'];?>" />
        <input type="hidden" name="button_subtype" value="services">
        <input type="hidden" name="no_note" value="0">
        <input type="hidden" name="cn" value="Add special instructions to the seller:">
        <input type="hidden" name="no_shipping" value="2">
        <input type="hidden" name="rm" value="1">
        <input type="hidden" name="return" value="http://ps2.digital-inflection.com/properties/my_properties">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
        <input type="hidden" name="amount" value="<?=$property['paypal_calculation']; ?>">
        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>

    <br>

<hr>