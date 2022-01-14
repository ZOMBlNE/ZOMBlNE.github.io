<!DOCTYPE html>
<html>
<head>
    <title>Гостевая книга</title>
</head>
<body>
    <?php
    Error_Reporting(E_ALL & ~E_NOTICE);
    if(!empty($_POST[cmdPost]))
    {
        $fp=fopen("new.txt", "a+");
        fputs($fp, "<font face=Arial size=2>От: <a href=\"mailto:".$_POST[email]."\">".$_POST[name]."</a><br>".$_POST[text]."<p><br><hr></font>");
        fclose($fp);
        echo "<font face=Arial size=2><b>Спасибо. Ваше сообщение добавлено в гостевую книгу.</b></font>";
    }
    ?>
    <form method="post" action="add.php"><br>
        <font face="Arial" size="2">Ваше имя:</font>
        <br>
        <input type="text" name="name">
        <br><br>
        <font face="Arial" size="2">Ваш E-mail:</font>
        <br>
        <input type="text" name="email">
        <br><br>
        <font face="Arial" size="2">Вашe пожелание:</font>
        <br>
        <textarea rows="15" cols="40" name="text"></textarea>
        <br><br>
        <input type="submit" name="cmdPost" value="Отправить">
        <input type="reset" name="cmdClear" value="Очистить">
    </form>
    <hr>
    <?php 
    if(file_exists("new.txt"))
    {
        include("new.txt");
    }
    ?>
</body>
</html>