<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "caricamenti/"; 
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



    if (file_exists($target_file)) {
        echo "Il file esiste già.";
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        echo "Il file è troppo grande.";
        $uploadOk = 0;
    }

    if ($FileType != "doc" && $FileType != "docx" && $FileType != "pdf" && $FileType != "rtf") {
        echo "Sono permessi solo file DOC - DOCX - PDF - RTF.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Spiacente, il tuo file non è stato caricato.";

    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "Il file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " è stato caricato.";
        } else {
            echo "C'è stato un errore nel caricamento del tuo file.";
        }
    }
}
?>
