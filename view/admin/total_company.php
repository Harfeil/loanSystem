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
            <div class="savingsTableContainer">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody id="result">
                        <?php 
                            $allsavings = $getSavings->getIncome();
                            $tableDisplay = [];

                            if (empty($allsavings)) {
                                $tableDisplay[] = "
                                    <tr>
                                        <td colspan='6'>No Transaction</td>
                                    </tr>";
                            } else {
                                foreach ($allsavings as $saves) {
                                    $tableDisplay[] = "
                                        <tr>
                                            <td>{$saves['t_id']}</td>
                                            <td>{$saves['fullname']}</td>
                                            <td>{$saves['t_type']}</td>
                                            <td>{$saves['total_payment']}</td>
                                            <td>{$saves['status']}</td>
                                            <td>{$saves['due_date']}</td>
                                        </tr>";
                                }
                            }

                            $tableContent = implode("\n", $tableDisplay);
                        ?>
                        <?php echo $tableContent; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script>
    </script>
</body>
</html>