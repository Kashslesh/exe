<?php 
function send_message (string $psuedo, string $mesg): bool
{
        require './database/connect.php';
        // $psuedo = $_POST['psuedo'];
        // $mesg = $_POST['textChat'];
        $sql = 'INSERT INTO chat2 VALUES (NULL, :nom, :mesg)';
        $users = $db->prepare($sql);
        $users->bindValue(":nom", $psuedo, PDO::PARAM_STR);
        $users->bindValue(":mesg", $mesg, PDO::PARAM_STR);
        $response = $users->execute();
        return $response;

}
function affichage (string $psuedo, string $mesg ): array {
        require './database/connect.php';
        $sql = 'SELECT * FROM chat2';
        $get_info->bindValue(":nom", $psuedo, PDO::PARAM_STR);
        $get_info->bindValue(":mesg", $mesg, PDO::PARAM_STR);
        $get_info->execute();
        $response = $get_info->fetchAll(PDO::FETCH_ASSOC);
        return $response;
}

?>