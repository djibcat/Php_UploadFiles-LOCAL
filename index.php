

<!--===========================================================HTML START ==================================================-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/styleIp.css">
    <title>Document</title>
    <?php
        include "./model/model.php"
    ?>
</head>

<body>
    <div class="main">
        <div class="header">
            <h1>You can upload a picture here</h1>
        </div>

        <div class="body">
            <form method="post" action="index.php" enctype="multipart/form-data">
            <p class="submit">
                <input type="file" name="picture" > <br/>
                <button type="submit">Submit</button>
            </p>  
            <div class="awnser">
                <p class="fileUploaded">
                <?php
                if(isset ($_FILES['picture']['name'])){ // test if the file is uploaded
                    if(isset($error)){ // test if error exist
                         echo $html; // html = error  ( error message from try catch)
                    }else {
                        echo ($html . '</br>' . '<a href="'.$basePath.'">'.'See your pic here !</a>');
                        //html = succes message + link to fullpath
                    };
                };
                ?> 
                </p>           
            </div>
            </form>
        </div>


        <div class="footer">
            <?php
               echo date("D w/M/Y"); //display date
            ?>
        </div>
    </div>


</body>
</html>
