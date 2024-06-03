<?php 


    include_once "../template/sidebar.php";

    include_once "../../controller/db_connector.php";
    include_once "../../model/user_model.php";

    $getSavings = new Register();


?>

        </div>

        <div class = "savingTitle">
            <h1>Total Company Income</h1>

            
            <div class = "moneyContainer">
                <div class = "money">
                    <?php 
                        $allNotif = $getSavings->getTotalIncome();

                        $tableDisplay = [];

                        
                        if (empty($allNotif)) {
                            $tableDisplay[] = "
                                 <h1 id = 'savingMoneyDisplay'>0.00</h1>";
                        } else{
                            foreach ($allNotif as $notifs){
                            $tableDisplay[] = "
                                <h1 id = 'savingMoneyDisplay'>{$notifs['total_income']}php</h1>";
                            }
                        }
                        

                        $tableContent = implode("\n", $tableDisplay);
                    ?>
                    <?php echo $tableContent; ?>
                    <p id = "totalSavingLblDisplay">Total Company Income</p>
                </div>

            </div>
        </div>

    </div>

    <script>
    </script>
</body>
</html>