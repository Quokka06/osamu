<?php

require_once 'config1.php';

$c = 15;
$o = 0;
if (isset($_GET['count'])) $c = intval($_GET['count']);
if ($c > 15) $c = 15;
if (isset($_GET['offset'])) $o = intval($_GET['offset']);

$sql = sprintf('SELECT `id`, `title`, `description`, `director`, `year`, `logo` FROM `videos` LIMIT %d OFFSET %d', $c, $o);
$videos = $conn->query($sql);

$result = '{"videos": [';
foreach ($videos as $row){
$id = $row['id'];
$title = $row['title'];
$description = $row['description'];
$director = $row['director'];
$year = $row['year'];
$logo = $row['logo'];

$result .= sprintf('{"id": %d, "title": "%s", "description": "%s", "director":%s, "year":%d, "logo": "%s"},', $id, $title, $description, $director, $year, $logo);
}
$result = rtrim($result, ',');
$result .= ']}';

echo $result;
?>