<?php 

    include_once "../template/sidebarUser.php";

    include_once "../../controller/db_connector.php";
    include_once "../../model/user_model.php";

    $getNotif = new Register();

?>
    </div>

            <div class = "loanContent">
                <div class = "titleLoan">
                    <h1>NOTIFICATIONS</h1>
                </div>

                <div class = "loanTableContainer">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
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
                                            <td>{$notifs['type']}</td>
                                            <td>{$notifs['total_payment']}</td>
                                            <td>{$notifs['deadline']}</td>
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