<?php 

    include_once "../template/sidebar.php";

    include_once "../../controller/db_connector.php";
    include_once "../../model/user_model.php";

    $getNotif = new Register();

?>
    </div>

            <div class = "loanContent">
                <div class = "titleLoan">
                    <h1>Billings</h1>
                </div>

                <div class = "loanTableContainer">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Full Name</th>
                                <th scope="col">Transaction Type</th>
                                <th scope="col">Total Payment</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $allNotif = $getNotif->getNotif();

                                $tableDisplay = [];

                                foreach ($allNotif as $notifs){
                                    $tableDisplay[] = "
                                        <tr>
                                            <td>{$notifs['full_name']}</td>
                                            <td>{$notifs['type']}</td>
                                            <td>{$notifs['monthly']}</td>
                                            <td>{$notifs['monthly_deadline']}</td>
                                            <td>{$notifs['status']}</td>
                                        </tr>";
                                }

                                $tableContent = implode("\n", $tableDisplay);
                            ?>
                             <?php echo $tableContent; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>
</html>