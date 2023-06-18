

<?php 
    session_start();
    
    if(isset($_SESSION["id_agence"])){
        include_once "config.php";
        $id_agence = $_SESSION["id_agence"];
        $id_admin = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages INNER JOIN admin ON admin.id_admin= messages.id_admin INNER JOIN agence ON agence.id_agence = messages.id_agence WHERE admin.id_admin = '$id_admin' AND agence.id_agence = '$id_agence' ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['sence'] === 'agence to admin'){
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