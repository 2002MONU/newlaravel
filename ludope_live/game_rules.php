<?php
include'includes/header.php';
$sql = mysqli_query($conn, "SELECT * FROM cms WHERE id='" . 3 . "'");
$cms = mysqli_fetch_assoc($sql);
?>
<?php include 'includes/header1.php'; ?>
<style>
    .btn-back{
        background-color:#0061c0;
        color:#fff;
        font-size:14px;
        float:right;
        padding:5px 15px;
        border-radius:5px;
    }
</style>
<section id="game_rules ">
    <div class="container">
        <div class="row">

            <div class="content">
                <div class="col-md-12">
                    <div class="about-content-sec common-cls terms">
                        <article>
                            <h2 class="text-center">Game Rules</h2>
                            <ul>
                                <li>If the player misses three chances, then the player will be out of the game.</li>
                                <li>	If the player exits the game wantedly after the game started then he will not get the bet amount back.</li>
                                <li>	If the player disconnects the internet or if he minimizes the game then he we will be considered as loser or lost the game.</li>
                                <li>	Once the timer is finished and if the player does not reconnect back to the game then he will lose the game.</li>
                                <li>	For every redeem the transaction charges of 12rs will be deducted.</li>
                                <li>	TDS of 30% will be deducted for the conversion over the daily limit as per the government rules.</li>
                                <li>	After completing the KYC the player will get 100 bonus coins in his lock bonus to start playing the game.</li>
                                <li>	The referral bonus 50 coins will be added if the referred person will complete his KYC successfully.</li>
                                <li>	Continues misbehaving of internet in the game will may lead to the account blocking.</li>
                                <li>	If our team finds a technical issue in the game than the bet amount will be shared equally. </li>
                                <li>	Also the possibility of winning percentage will be checked while sharing the bet amount equally.</li>
                                <li>	Any redeems getting failed from the receiver account will be refunded back to game wallet.</li>
                                <li>	If any recharges/ deposits not added to the game will be manually checked and added on informing to our Support Team thorough Call/ Chat. </li>
                                <li>	For all the recharges/deposits, GST deduction of 28% will be applied as per the new government rules.</li>
                                <li>	For all the recharges/deposits, GST deduction of 28% will be applied as per the new government rules.</li>
                                <li>	Each player will get cashback of upto 10% on his first successful recharge.</li>
                                <li>	The player who is leading the leaderboard will receive weekly bonus</li>
                                
                                
                            </ul>
                        </article>
                    </div>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<?php include 'includes/footer.php'; ?>