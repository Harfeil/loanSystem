<?php
session_start();
include_once "../../controller/db_connector.php";
include_once "../../model/user_model.php";

header('Content-Type: application/json');

$getNotif = new Register();
$response = ['status' => 'error', 'html' => ''];

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id'])) {
        $userId = $_POST['user_id'];
        $_SESSION['specific_id'] = $userId;
        $allNotif = $getNotif->getSpecificBills($userId);

        $tableDisplay = [];

        if (empty($allNotif)) {
            $tableDisplay[] = "<tr><td colspan='6'>No Billings Found</td></tr>";
        } else {
            foreach ($allNotif as $notifs) {
                $tableDisplay[] = "
                    <tr>
                        <td>{$notifs['full_name']}</td>
                        <td>{$notifs['type']}</td>
                        <td>{$notifs['monthly']}</td>
                        <td>{$notifs['monthly_deadline']}</td>
                        <td>{$notifs['status']}</td>
                    </tr>";
            }
        }

        $response['status'] = 'success';
        $response['html'] = implode("\n", $tableDisplay);
    }
} catch (Exception $e) {
    error_log($e->getMessage());
}

echo json_encode($response);
