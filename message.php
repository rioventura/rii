<!DOCTYPE html>
<html>

<?php include 'cdn.php'; ?>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include 'side.php'; ?>

        <!-- Page Content  -->
        <div id="content">
            <?php include 'nav.php'; ?>

            <!-- <div class="container ">
                <div class="row  mb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Launch demo modal
                    </button>
                </div> -->
                <div class="row justify-content-center">
                    <div class="col-md-8 offset">
                        <div class="card">
                            <div class="card-body">
                                <div class="container" style="max-width: 800px; margin: 20px auto;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2>Messages</h2>
                                            <?php
                                            $currentDate = date('Y-m-d');

                                            include '../config/conn.php';

                                            // Fetch messages for today's date with a minimum due date of 1 day
                                            $sql_messages_today = "SELECT * FROM `message_tbl` WHERE DATE(date) = '$currentDate' AND DATE_ADD(date, INTERVAL 1 DAY) >= CURDATE()";
                                            $result_messages_today = $conn->query($sql_messages_today);

                                            if ($result_messages_today->num_rows > 0) {
                                                while ($row_message_today = $result_messages_today->fetch_assoc()) {
                                                    // Format the date
                                                    $formatted_date = date("l, F d, Y", strtotime($row_message_today["date"]));

                                                    echo '
                                                    <div class="card" style="margin-bottom: 10px;">
                                                        <div class="card-body">
                                                            <h6 class="card-title">' . $row_message_today["full_name"] . '</h6>
                                                            <h6 class="card-subtitle mb-2 text-muted">' . $row_message_today["email"] . '</h6>
                                                            <p class="card-text">' . $row_message_today["phone_number"] . '</p>
                                                            <p class="card-text">' . $row_message_today["subject"] . '</p>
                                                            <p class="card-text">' . $row_message_today["message"] . '</p>
                                                            <button class="btn btn-link" style="text-decoration: none;" data-toggle="collapse" data-target="#message_' . $row_message_today["message_id"] . '"> ' . $formatted_date . '</button>
                                                            <div id="message_' . $row_message_today["message_id"] . '" class="collapse">
                                                                <p>Message for today: ' . $formatted_date . '</p>
                                                            </div>
                                                        </div>
                                                    </div>';
                                                }
                                            } else {
                                                echo "<p>No messages found for today or due date has passed.</p>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> -->

    <?php include 'footer.php'; ?>

</body>

</html>
