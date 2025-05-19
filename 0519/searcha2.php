<?php
$text = $_POST['song'];


while ($row = fgetcsv("songs.csv")) {
    if ($text === $row[0]) {
    }
}
