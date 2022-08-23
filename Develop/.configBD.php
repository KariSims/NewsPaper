<?php
        $host = 'mysql:host=192.168.1.7;dbname=mglsi_news';
        // $host = 'mysql:host=localhost;dbname=mglsi_news';
        $user = 'lambda';
        $passwd = 'p@sser';
?>

<!-- 
    CREATE ROLE 'visiteurs'@'%';
    GRANT ALL ON mglsi_news.* TO 'visiteurs';
    CREATE USER visiteur IDENTIFIED BY 'p@sser' DEFAULT ROLE visiteurs WITH MAX_QUERIES_PER_HOUR 20 MAX_USER_CONNECTIONS 2;
    flush privileges; 
 -->