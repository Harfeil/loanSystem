<?php 

    include_once "../template/sidebar.php";

    include_once "../../controller/db_connector.php";
    include_once "../../model/user_model.php";

    $getTransact = new Register();


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
                            $transactions = $getTransact->getTransaction();

                            $tableDisplay = [];

                            if(empty($transactions)){
                                $tableDisplay[] = "
                                
                                    <td colspan = '6'>No Transaction Found.</td>
                                
                                ";
                            }else{
                                foreach ($transactions as $trans){
                                    $tableDisplay[] = "
                                        <tr>
                                            <td>{$trans['fullname']}</td>
                                            <td>{$trans['type']}</td>
                                            <td>{$trans['total_payment']}</td>
                                            <td>{$trans['date']}</td>
                                            <td>{$trans['status']}</td>
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