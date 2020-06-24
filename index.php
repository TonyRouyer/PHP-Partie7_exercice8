<?php include 'indexController.php'; ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>partie 7 exercice 8</title>
        <style>
            form {
                display: flex;
                flex-direction: column;
                width: 50%;
                margin: 0 auto;
            }
            label, #sendFile {
                margin-top: 10px;
            }
            #firstname, #lastname {
                border: 0px;
                border-bottom: 1px Solid black;
            }
            #sendBtn {
                width: 10%;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
    <?php 
        //si le formulaire est validé et qu'il n y a pas d erreurs
        if(isset($_REQUEST['filesForm']) && count($formError) == 0) { ?>
            <p><?= 'bonjour ' . $civility . ' ' . $firstname . ' ' . $lastname ?></p>
            <p><?= $sendFile ?></p></P>
        <?php
        }else { ?>
                <form action="index.php" method="POST" enctype="multipart/form-data">
                    <label for="civility"> Civilité :
                    <select name="civility" id="civilite">
                        <?php 
                        foreach($civilityList as $civilityName => $civilityValue) { ?>
                            <option <?= isset($_REQUEST['civility']) && $_REQUEST['civility'] == $civilityValue ? 'selected' : '' ?> value="<?= $civilityValue ?>"><?= $civilityName ?></option>
                        <?php } ?>
                    </select>
                    </label>
                    <p><?= isset($formError['civility']) ? $formError['civility'] : '' ?></p>
                    <label for="firstname">Prénom : <input type="text" id="firstname" name="firstname" /></label>
                    <p><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?></p>
                    <label for="lastname">Nom : <input type="text" id="lastname" name="lastname" /></label>
                    <p><?= isset($formError['lastname']) ? $formError['lastname'] : '' ?></p>
                    <input type="file" name="sendFile" id="sendFile" />
                    <p><?= isset($formError['sendFile']) ? $formError['sendFile'] : '' ?></p>
                    <input type="submit" id="sendBtn" name="filesForm" />
                </form>
        <?php  } ?>
    </body>
</html>