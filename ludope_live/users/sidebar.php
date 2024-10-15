<ul class="sidebar-menu" data-widget="tree">

    <li class="">

        <a href="dashboard.php">

            <i class="fa fa-dashboard"></i> <span>Dashboard</span>

        </a>

    </li>
    <?php if (in_array('manage_user', $user_privileges)) { ?>
        <li><a href="list_user.php"><i class="fa fa-user-circle "></i>Manage User</a></li>
    <?php }if (in_array('user_history', $user_privileges)) { ?>
        <li><a href="users_history.php"><i class="fa fa-user-circle "></i>Users History</a></li>
    <?php }if (in_array('user_bio', $user_privileges)) { ?>
        <li><a href="user_history.php"><i class="fa fa-user-circle "></i>Users Bio</a></li>
    <?php }
    if (in_array('referrels', $user_privileges)) {
        ?>
        <li><a href="referrals.php"><i class="fa fa-user-circle "></i>Referrals</a></li>
    <?php }
    if (in_array('banners', $user_privileges)) {
        ?>
        <li><a href="banners.php"><i class="fa fa-image "></i>Banners</a></li>
    <?php }if (in_array('classic_leader_board', $user_privileges)) { ?>
        <li><a href="leader_board.php?board_type=2"><i class="fa fa-list "></i>Classic Leader Board</a></li>
    <?php }if (in_array('lite_leader_board', $user_privileges)) { ?>
    <!--        <li><a href="leader_board.php?board_type=4"><i class="fa fa-list "></i>Lite Leader Board</a></li>-->
    <?php }if (in_array('balance_transaction', $user_privileges)) { ?>
        <li><a href="add_coin.php"><i class="fa fa-user-circle "></i>Balance Transaction</a></li>
    <?php }if (in_array('game_details', $user_privileges)) { ?>
        <li><a href="history.php?date1=<?= date('Y-m-d', strtotime('-30 days')); ?>&date2=<?= date('Y-m-d'); ?>"><i class="fa fa-user-circle "></i>Game Details</a></li>
    <?php }if (in_array('withdraw_request', $user_privileges)) { ?>
        <li><a href="withdraw.php"><i class="fa fa-user-circle "></i>Withdraw Request</a></li>
    <?php }if (in_array('withdraw_history', $user_privileges)) { ?>
        <li><a href="withdrawhistory.php"><i class="fa fa-user-circle "></i>Withdraw History</a></li>
    <?php }if (in_array('push_notifications', $user_privileges)) { ?>
        <li><a href="push_notifications.php"><i class="fa fa-user-circle "></i>push Notifications</a></li>
    <?php }if (in_array('kyc', $user_privileges)) { ?>
        <li><a href="kyc.php"><i class="fa fa-user-circle "></i>KYC</a></li>
    <?php }if (in_array('payment_order', $user_privileges)) { ?>
    <?php }if (in_array('bank_details', $user_privileges)) { ?>
        <li><a href="bank_details.php"><i class="fa fa-user-circle "></i>Bank details</a></li>
        <?php
    }
    if (in_array('upi_details', $user_privileges)) {
        ?>
        <li><a href="upi_details.php"><i class="fa fa-user-circle "></i>Upi details</a></li>
        <?php
    }

    if (in_array('transactions', $user_privileges)) {
        ?>
        <li><a href="transactions.php"><i class="fa fa-user-circle "></i>Transactions</a></li>
    <?php } if (in_array('payment_order', $user_privileges)) { ?>
    <!--        <li><a href="payment.php"><i class="fa fa-user-circle "></i>Payment Order</a></li>-->
    <?php }if (in_array('cms_management', $user_privileges)) { ?>
        <li><a href="cms_list.php"><i class="fa fa-user-circle "></i>CMS Management</a></li>
    <?php }if (in_array('constants', $user_privileges)) { ?>
        <li><a href="constants.php"><i class="fa fa-user-circle "></i>Constants</a></li>
    <?php }if (in_array('contact_us', $user_privileges)) { ?>
        <li><a href="contactus.php"><i class="fa fa-user-circle "></i>Contact us Enquiries</a></li>
<?php } ?>



<!--    <li><a href="changepass.php"><i class="fa fa-user-circle "></i>Change Password</a></li>-->

    <li><a href="logout.php"><i class="fa fa-user-circle "></i>Log Out</a></li>



</ul>