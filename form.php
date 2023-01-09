<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>

<body>
    <form action="insert.php" method="post" enctype="multipart/form-data">
        <label for="titre">Titre:</label>
        <input type="text" name="titre" id="titre" required>
        <br>
        <label for="commentaire">commentaire:</label>
        <br>
        <textarea name="commentaire" id="commentaire" cols="10" rows="5" required></textarea>
        <br>
        <input type="file" name="img" required>
        <br>
        <button type="submit">SEND</button>
    </form>
</body>

</html>