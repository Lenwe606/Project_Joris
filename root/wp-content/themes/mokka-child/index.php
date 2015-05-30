<?php get_header(); ?>
	
	<div align="center">
    <a href="?page=overview" style="display:inline-block;width:70px">Home</a>
    <a href="?page=projects" style="display:inline-block;width:70px">Projecten</a>
    <a href="?page=events" style="display:inline-block;width:70px">Events</a>
    <a href="?page=articles" style="display:inline-block;width:70px">Artikels</a>
    <a href="?page=ads" style="display:inline-block;width:70px">Zoekertjes</a>
    </div>

<?php
if(isset($_GET["page"]))
{
    if($_GET["page"] == "projects") get_template_part("projectoverview");
    else if($_GET["page"] == "overview") get_template_part("overview");
    else if($_GET["page"] == "projectdetail") get_template_part("projectdetail");
}
else get_template_part("overview");
?>

<?php get_footer(); ?>