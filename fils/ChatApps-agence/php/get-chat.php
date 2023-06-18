<?php 
    session_start();
    if(isset($_SESSION['id_agence'])){
        include_once "config.php";
        $id_agence = $_SESSION['id_agence'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages INNER JOIN agence ON agence.id_agence= messages.id_agence INNER JOIN client ON client.id_client = messages.id_client WHERE client.id_client = '$incoming_id' AND agence.id_agence = '$id_agence' ORDER BY msg_id";

        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['sence'] === 'agence to client'){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="karim.avif" alt="">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= "<div class='text'>Aucun message n'est disponible. Une fois que vous avez envoyé un message, ils apparaîtront ici.</div>";
        }
        echo $output;
    }

?>