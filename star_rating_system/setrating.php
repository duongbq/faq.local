<?php

session_start();
require_once("dbconnection.php");

$points = mysql_real_escape_string(strip_tags($_POST["p"]));
$articleid = mysql_real_escape_string(strip_tags($_POST["id"]));

addArticleRating($articleid, $points);

function addArticleRating($articleid, $points) {
    $sql = "INSERT INTO articlerating(articleid,ratingpoint) VALUES('$articleid','$points')";
    mysql_query($sql) or die("Error in Add rating1");

    $sql = "select count(id) as votecount,sum(ratingpoint) as ratingpoint from articlerating";
    $rsa = mysql_query($sql) or die("Error in Add rating2");
    $row = mysql_fetch_object($rsa);

    $average = 0;
    if ($row->votecount > 0)
        $average = $row->ratingpoint / $row->votecount;
    $average = Round($average, 2);

    $responsetext .= "";
    for ($i = 1; $i <= 5; $i++) {
        if ($average >= $i)
            $responsetext .= '<img src="images/rate1.gif" hspace="1" vspace="0"  alt="' . $average . '%"/>';
        else {
            if ($i == intval($average + .7))
                $responsetext .= '<img src="images/rate.gif" hspace="1" alt="' . $average . '%"/>';
            else
                $responsetext .= '<img src="images/rate0.gif" hspace="1" alt="' . $average . '%"/>';
        }
    }
    $responsetext .= ", <font class='esd'><b>" . $average . "/5</b> from <b>" . $row->votecount . "</b> votes </font><p><a href='javascript:location.href=\"\"'>Vote Again</a></p>";

    $responsetext1 = 'Thanks, Your rating ' . $points . ' is submitted successfully!!!';

    $scripts = "document.getElementById('setrating').innerHTML=r.r;alert(r.m)";
    $json = array();
    $json['r'] = $responsetext;
    $json['m'] = $responsetext1;
    $json['s'] = $scripts;
    header("Content-type: application/json");
    echo json_encode($json);
}
