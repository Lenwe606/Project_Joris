<?php
function projects_item($id, $title, $date, $location, $description)
{
    if($title == null) $title = "";
    if($date == null) $date = "";
    if($location == null) $location = "";
    if($description == null) $description = "";
    return array("id" => $id, "title" => $title, "date" => $date, "location" => $location, "description" => $description);
}

function events_item($id, $title, $date, $location, $description)
{
    if($title == null) $title = "";
    if($date == null) $date = "";
    if($location == null) $location = "";
    if($description == null) $description = "";
    return array("id" => $id, "title" =>$title, "date" => $date, "location" => $location, "description" =>$description);
}

function news_item($date, $img, $name, $reaction)
{
    if($date == null) $date = "";
    if($img == null) $img = "";
    if($name == null) $name = "";
    if($reaction == null) $reaction = "";
    return array("date" => $date, "img" => $img, "name" => $name, "reaction" => $reaction);
}

function ads_item($img, $title, $date, $text, $linked)
{
    if($img == null) $img = "";
    if($title == null) $title = "";
    if($date == null) $date = "";
    if($text == null) $text = "";
    if($linked == null) $linked = "";
    return array($img, $title, $date, $text, $linked);
}

function articles_item($title, $date, $category, $text, $linked)
{
    if($title == null) $title = "";
    if($date == null) $date = "";
    if($category == null) $category = "";
    if($text == null) $text = "";
    if($linked == null) $linked = "";
    return array($title, $date, $category, $text, $linked);
}

function comments_item($date, $img, $name, $reaction, $delete)
{
    if($date == null) $date = "";
    if($img == null) $img = "";
    if($name == null) $name = "";
    if($reaction == null) $reaction = "";
    if($delete == null) $delete = "";
    return array($date, $img, $name, $reaction, $delete);
}

function project_detail($id, $title, $description, $date, $time, $city, $street, $website, $name, $category){
    if($title == null) $title = "";
    if($description == null) $description = "";
    if($date == null) $date = "";
    if($time == null) $time = "";
    if($city == null) $city = "";
    if($street == null) $street = "";
    if($website == null) $website = "";
    if($name == null) $name = "";
    if($category == null) $category = "";
    return array("id" => $id, "title" => $title, "description" => $description, "date" => $date, "time" =>$time, "city" => $city, "street" => $street, "website" => $website, "name" => $name, "category" => $category);
}

function citysList($id, $city){
    if($city == null) $city = "";
    return array("id" => $id, "city" => $city);
}
?>