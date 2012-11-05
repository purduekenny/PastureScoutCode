<?php
    $user_id = $this->tank_auth->get_user_id();
?>



            <div class="tabbable span12" style="margin-left: -1px;">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tabs1-pane1" data-toggle="tab"><strong>Pasture Seeking</strong></style> </a></li>
                    <li><a href="#tabs1-pane2" data-toggle="tab"><strong>Pasture Leasing</strong></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs1-pane1">
                        <h2>Looking for pastures?</h2>
                            <p>Save time and money by using PastureScout’s customized search tool to find leases that meet your specific grazing needs.  Compare properties by saving them to your favorites. Bid on auction properties and stay informed about competitors’ bids.</p>
                            <h2>Membership Levels</h2>
                         <h3>Basic: <strong>Absolutely Free</strong></h3>
                        
                         <div style="margin-left: 10px;">
                            <ul>
                                <li>Use the custom search tool to identify properties that meet your needs</li>
                                <li>Save property searches to your favorites</li>
                                <li><span class="label label-important">Not released yet</span> Use the Lease Calculator to estimate your costs and breakevens</li>
                            </ul>
                        </div>

                        <hr />
                        <h3>Plus: <strong>$25.00/month subscription</strong></h3>
                        <div style="margin-left: 10px;">    
                            <ul>
                                <li>See owner contact information for all properties</li>
                                <li><span class="label label-important">Not released yet</span> Be eligible to bid on auction properties</li>
                            </ul>
                        </div>
                        <div style="margin: 10px 0 0 70px;">    
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
                                        <input type="hidden" name="a3" value="25.00">
                                        <input type="hidden" name="p3" value="1">
                                        <input type="hidden" name="t3" value="M">
                                        <input type="hidden" name="custom" value="<?=$user_id?>" />
                                        <input type="hidden" name="currency_code" value="USD">
                                        <input type="hidden" name="bn" value="PP-SubscriptionsBF:btn_subscribeCC_LG.gif:NonHosted">
                                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                    </form>
                        </div>
                        <br /><br />

                    </div> <!--end tabbed content for 1 --> 
                    <div class="tab-pane" id="tabs1-pane2">
                        <h2>Want to lease your pasture?</h2> 
                            <p>PastureScout is a simple and affordable way to reach thousands of pasture seekers faster than word of mouth or a local newspaper. List your property and then realize market value for your lease by using our auction tool.  Stay updated about who is bidding and what the bids are.</p> 
                            <h2>Membership Levels</h2>
                            <h3>Classified Listing: Free 1 month trial then <strong>$35.00/month</strong></h3>
                            <div style="margin-left: 10px;">
                                <ul>
                                    <li>Gain exposure to thousands of pasture seekers</li>
                                    <li>Specify terms of lease</li>
                                    <li>Access data about area lease prices</li>
                                    <li><span class="label label-important">Not released yet</span> Monitor seeker activity for your listing</li>
                                </ul>
                            </div>
                            <div style="margin: 10px 0 3px 70px;">
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
                                    <input type="hidden" name="a3" value="35.00">
                                    <input type="hidden" name="p3" value="1">
                                    <input type="hidden" name="t3" value="M">
                                    <input type="hidden" name="custom" value="<?=$user_id?>" />
                                    <input type="hidden" name="currency_code" value="USD">
                                    <input type="hidden" name="bn" value="PP-SubscriptionsBF:btn_subscribeCC_LG.gif:NonHosted">
                                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                </form>
                        </div>
                            <br /><br />
                            <div class="alert alert-info" style="margin: 5px;">We will roll out the auction service in a few weeks, at which point bidding for leases can begin. Until then, please list and search properties to gain an idea of what is offered. -PastureScout Team</div>
                    </div>
                </div><!-- /.tab-content -->
            </div><!-- /.tabbable -->






<!--
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

            <h3>Public Auction</h3>
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
            <br>


            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
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
            </form> 


        </td>
    </tr>

</table>
ennd sandbox code -->