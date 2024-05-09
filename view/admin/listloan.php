<?php 
    include_once "../../controller/db_connector.php";

    $db = new Database();

    include_once "../template/sidebar.php";

?>

        </div>
        

        <div class = "content">
            <h1 id = "pageTitle">List of Loans</h1>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Loan Amount</th>
                        <th scope="col">Loan Date</th>
                        <th scope="col">Total Payment</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php 
                    
                        $sql = "SELECT CONCAT(user_tbl.fname, ' ', user_tbl.lname) as fullname, loan_tbl.loan_money as loan_money, loan_tbl.with_interest as interest, loan_tbl.loan_date as loan_date, loan_tbl.deadline as deadline, loan_tbl.status as status FROM loan_tbl INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id ORDER BY loan_tbl.loan_id DESC";
                        $allUsers = $db->retrieve($sql);

                        if($allUsers){
                            while($row = mysqli_fetch_assoc($allUsers)){
                                ?>
                                    <tr class = "showDetailsBtn">
                                        <td><?=$row["fullname"]?></td>
                                        <td><?=$row["loan_money"]?></td>
                                        <td><?=$row["loan_date"]?></td>
                                        <td><?=$row["loan_money"] + $row["interest"]?></td>
                                        <td><?=$row["deadline"]?></td>
                                        <td><?=$row["status"]?></td>
                                        <td><button type="button" class="btn btn-outline-info">Show Details</button></td>
                                    </tr>
                                <?php 
                            }
                        }

                    ?>

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>