<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE messages.id_client = {$row["id_client"]} AND messages.id_agence = '$id_agence' ORDER BY msg_id DESC LIMIT 1";

        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if($row2['sence']== "agence to client"){
             $you = "You: ";
        }else{
            $you = "";
        }
        ($row['status'] == "En ligne") ? $offline = "Hors-ligne" : $offline = "";

        $output .= '<a href="chat.php?user_id='. $row['id_client'] .'">
                    <div class="content">
                    <img src="karim.avif" alt="">
                    <div class="details">
                        <span>'. $row['nom']. " " . $row['prénom'].'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }

    

?>