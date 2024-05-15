<?php 

    include_once "../template/sidebar.php";

    include_once "../../controller/db_connector.php";

    $db = new Database();

?>
    </div>

        <div class = "loanContent">
            <div class = "titleLoan">
                <h1>Transcations</h1>
            </div>

            <div class = "loanTableContainer">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Full Name</th>
                            <th scope="col">Transaction Type</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date Transaction</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql = "SELECT user_tbl.fname as fname, user_tbl.lname as lname, user_tbl.gender as gender, user_tbl.birthday as birth, user_tbl.age as age, user_tbl.email as email, user_tbl.bank_name as bank_name, user_tbl.holder_name as holder, loan_tbl.loan_money as money, loan_tbl.deadline as deadline, loan_tbl.with_interest as interest, loan_tbl.loan_id as loan_id, transaction_table.t_type as type, transaction_table.date as date, transaction_table.status as status FROM transaction_table INNER JOIN loan_tbl ON transaction_table.loan_id = loan_tbl.loan_id INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id";
                        $transactions = $db->retrieve($sql);

                        if ($transactions && mysqli_num_rows($transactions) > 0) {
                            while ($row = mysqli_fetch_assoc($transactions)) {
                                ?>
                                <tr class="showDetailsBtn">
                                    <td><?=$row["fname"]." " . $row["lname"]?></td>
                                    <td><?=$row["type"]?></td>
                                    <td><?=$row["money"] + $row["interest"]?></td>
                                    <td><?=$row["date"]?></td>
                                    <td><?=$row["status"]?></td>
                                </tr>
                                <?php 
                            }
                        } else {
                            ?>
                            <tr class="showDetailsBtn">
                                <td colspan="6" id = "noLoanfound">No Transaction Yet.</td>
                            </tr>
                            <?php 
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var loanBtn = document.getElementById("loanBtn");
        var closeImage = document.getElementById("closeImage");
        var popupForm = document.getElementById("popupForm");

        loanBtn.addEventListener("click", function() {
            popupForm.style.display = "block";
        });

        closeImage.addEventListener("click", function() {
            popupForm.style.display = "none";
        });
    });
</script>
</body>
</html>