<?php

    session_start();
    include ('');

       // $q = $DBH ->prepare("SELECT * FROM comments WHERE topicid= :topic")
        $q ->binValues(": topicid", $topicID);
        $q->execute();
        $row = $q->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $r){
            $id = $r['id'];
            $content = $r['content'];
            $authorID = $r['authorID'];

            //$q1 = $DBH->prepare("SELECT * FROM WHERE id=")
            $q1 -> binValues(':id', $authorID);
            $q1->execute();
            $authors = $q1->fetch(PDO::FETCH_ASSOC);
            $name = $authors['names'];
            $avatar = $author['avatar'];
            //create media pbject
            echo "<div class='media'>;"
            echo    "<div class='media-left'>";
            echo        "<img src='data:image/jpeg:base64. ".base64_encode($avatar)."'class='media-object' style='width:60px'>";
            echo "</div>";
            echo "<div class='media-body'>";
        }