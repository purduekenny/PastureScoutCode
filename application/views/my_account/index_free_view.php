<?php
    $user_id = $this->tank_auth->get_user_id();
?>
<h3>Choose a subscription</h3>

<table>
    <tr>
        <td>                
            <h2>Pasture Seeking</h2>
            <h3>Basic</h3>
            <ul>
                <li>Use the custom search tool to identify properties that meet your needs</li>
                <li>Save properties to your favorites</li>
                <li>Use the Lease Calculator to estimate your costs and breakevens</li>
                <li><strong>Free</strong></li>
            </ul>

            <h3>Plus</h3>
            <ul>
                <li>See owner contact information for all properties</li>
                <li>Be eligible to bid on auction properties</li>
                <li><strong>$25 for 1 month</strong></li>
            </ul>
            <br>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_xclick-subscriptions">
    <input type="hidden" name="business" value="NZWHF3HL66BXG">
    <input type="hidden" name="lc" value="US">
    <input type="hidden" name="item_name" value="Pasture Seeking">
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="no_shipping" value="2">
    <input type="hidden" name="rm" value="1">
    <input type="hidden" name="return" value="<?= base_url()?>/my_account">
    <input type="hidden" name="src" value="1">
    <input type="hidden" name="a3" value="0.10">
    <input type="hidden" name="p3" value="1">
    <input type="hidden" name="t3" value="M">
    <input type="hidden" name="custom" value="<?=$user_id?>" />
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="bn" value="PP-SubscriptionsBF:btn_subscribeCC_LG.gif:NonHosted">
    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>


<!--             <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_xclick-subscriptions">
                <input type="hidden" name="business" value="TPB9A26YJSPLJ">
                <input type="hidden" name="lc" value="US">
                <input type="hidden" name="item_name" value="Pasture Seeking">
                <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="no_shipping" value="2">
                <input type="hidden" name="rm" value="1">
                <input type="hidden" name="return" value="<?= base_url()?>/my_account">
                <input type="hidden" name="src" value="1">
                <input type="hidden" name="a3" value=".10">
                <input type="hidden" name="p3" value="1">
                <input type="hidden" name="t3" value="M">
                <input type="hidden" name="custom" value="<?=$user_id?>" />
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="bn" value="PP-SubscriptionsBF:btn_subscribeCC_LG.gif:NonHosted">
                <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form> 
-->
        </td>
        <td>
            <h2>Pasture Leasing</h2>
            <h3>Classified Listing</h3>
            <ul>
                <li>Gain exposure to thousands of pasture seekers</li>
                <li>Specify terms of lease</li>
                <li>Access data about area lease prices</li>
                <li>Monitor seeker activity for your listing</li>
                <li><strong>Free for 1 month, then $35/month</strong></li>
            </ul>

<!--             <h3>Public Auction</h3>
            <ul>
                <li>Specify length of auction, minimum bid, and bid increments</li>
                <li>Monitor bid activity</li>
                <li>Any interested seeker can bid on your lease</li>
                <li><strong>$.10/acre, minimum $100</strong></li>
            </ul>

            <h3>Private Auction</h3>
            <ul>
                <li>Limit an auction to bidders of your choosing</li>
                <li>Use PastureScout’s auction platform to manage your auction, saving you time and hassle</li>
               <li><strong>$.10/acre, minimum $100</strong></li>
            </ul>     
-->     
            <br>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_xclick-subscriptions">
    <input type="hidden" name="business" value="NZWHF3HL66BXG">
    <input type="hidden" name="lc" value="US">
    <input type="hidden" name="item_name" value="Pasture Leasing">
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="no_shipping" value="2">
    <input type="hidden" name="rm" value="1">
    <input type="hidden" name="return" value="<?= base_url()?>/my_account">
    <input type="hidden" name="src" value="1">
    <input type="hidden" name="a3" value="0.20">
    <input type="hidden" name="p3" value="1">
    <input type="hidden" name="t3" value="M">
    <input type="hidden" name="custom" value="<?=$user_id?>" />
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="bn" value="PP-SubscriptionsBF:btn_subscribeCC_LG.gif:NonHosted">
    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>




<!--             <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_xclick-subscriptions">
                <input type="hidden" name="business" value="TPB9A26YJSPLJ">
                <input type="hidden" name="lc" value="US">
                <input type="hidden" name="item_name" value="Pasture Leasing">
                <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="no_shipping" value="2">
                <input type="hidden" name="rm" value="1">
                <input type="hidden" name="return" value="<?= base_url()?>/my_account">
                <input type="hidden" name="src" value="1">
                <input type="hidden" name="a3" value=".20">
                <input type="hidden" name="p3" value="1">
                <input type="hidden" name="t3" value="M">
                <input type="hidden" name="custom" value="<?=$user_id?>" />
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="bn" value="PP-SubscriptionsBF:btn_subscribeCC_LG.gif:NonHosted">
                <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form> -->
        </td>
    </tr>

</table>