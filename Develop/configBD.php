<?php
        $user = 'visiteur';
        $passwd = 'p@sser';
        $host = 'mysql:host=192.168.1.6;dbname=mglsi_news';
?>

<!-- 
    CREATE ROLE 'visiteurs'@'%';
    GRANT ALL ON mglsi_news.* TO 'visiteurs';
    CREATE USER visiteur IDENTIFIED BY 'p@sser' DEFAULT ROLE visiteurs WITH MAX_QUERIES_PER_HOUR 20 MAX_USER_CONNECTIONS 2; 
 -->