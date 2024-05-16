<?php 

    include_once "../template/sidebarUser.php";

    include_once "../../controller/db_connector.php";

    $db = new Database();

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
                            $sql = "SELECT transaction_table.t_id as trans_id, transaction_table.t_type as type, transaction_table.status as status, loan_tbl.loan_money as money, loan_tbl.with_interest as interest, loan_tbl.deadline as deadline FROM transaction_table INNER JOIN loan_tbl ON transaction_table.loan_id = loan_tbl.loan_id INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id ORDER BY transaction_table.t_id DESC";
                            $allUsers = $db->retrieve($sql);

                            $totalInterest = 0;

                            if ($allUsers && mysqli_num_rows($allUsers) > 0) {
                                while ($row = mysqli_fetch_assoc($allUsers)) {
                                    ?>
                                    <tr class="showDetailsBtn">
                                        <td><?=$row["type"]?></td>
                                        <td><?=$row["money"] + $row["interest"]?></td>
                                        <td><?=$row["deadline"]?></td>
                                        <td><?=$row["status"]?></td>
                                    </tr>
                                    <?php 
                                }
                            } else {
                                ?>
                                <tr class="showDetailsBtn">
                                    <td colspan="4" id = "noLoanfound">No loans found.</td>
                                </tr>
                                <?php 
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>
</html>