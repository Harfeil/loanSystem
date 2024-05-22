<?php 

    include_once "../template/sidebarUser.php";

    include_once "../../controller/db_connector.php";
    include_once "../../model/user_model.php";

    $getSavings = new Register();


?>

        </div>

        <div class = "savingTitle">
            <h1>Savings</h1>

            
            <div class = "moneyContainer">
                <div class = "money">
                    <?php 
                        $allNotif = $getSavings->getSavings();

                        $tableDisplay = [];

                        foreach ($allNotif as $notifs){
                            $tableDisplay[] = "
                                <h1 id = 'savingMoneyDisplay'>{$notifs['savings']}php</h1>";
                        }

                        $tableContent = implode("\n", $tableDisplay);
                    ?>
                    <?php echo $tableContent; ?>
                    <p id = "totalSavingLblDisplay">Total Savings</p>
                </div>
                <div class = "savingBtnContainer">
                    <button id = "savingDepositBtn">Deposit</button>
                    <button id = "savingWithdrawBtn">Withdrawal</button>
                </div>
            </div>
        </div>
        <div id="popupFormDeposit" class="popup-details-deposit">
            <img id = "closeImageDeposit" src="../../model/upload/close.png" alt="" width = "30px" height = "30px">
            <form action="../../controller/savings.php" method = "POST">
                <label for="">Enter Amount:</label><br><br>
                <input type="text" placeholder = "100 - 1000" id = "depositAmountInput" name = "amount_dep"><br><br>
                <button type="submit" name = "deposit_amount" class="btn btn-outline-primary">Submit</button>
            </form>
        </div>

        <div id="popupFormWithdraw" class="popup-details-deposit">
            <img id = "closeImageWithdraw" src="../../model/upload/close.png" alt="" width = "30px" height = "30px">
            <form action="../../controller/savings.php" method = "POST">
                <label for="">Enter Amount:</label><br><br>
                <input type="text" placeholder = "500 - 5000" id = "depositAmountInput" name = "withdraw_amount"><br><br>
                <button type="submit" name = "withdraw_submit" class="btn btn-outline-primary">Submit</button>
            </form>
        </div>


    </div>

    <script>
        savingDepositBtn.addEventListener("click", function(){
            popupFormDeposit.style.display = "block";
        });
        
        savingWithdrawBtn.addEventListener("click", function(){
            popupFormWithdraw.style.display = "block";
        });

        closeImageDeposit.addEventListener("click", function(){
            popupFormDeposit.style.display = "none";
        });

        closeImageWithdraw.addEventListener("click", function(){
            popupFormWithdraw.style.display = "none";
        });
    </script>
</body>
</html>