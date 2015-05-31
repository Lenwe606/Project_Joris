<?php include_once("array_functions.php"); ?>
<?php
function get_projects(){
    $projectsArray = array();
    $conn = DB_connectie();
    $sql = "SELECT Id, Titel, Aanmaakdatum, Straat, Omschrijving FROM tblprojecten";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $projectsArray[] = projects_item($row["Id"],$row["Titel"], $row["Aanmaakdatum"], $row["Straat"], $row["Omschrijving"]);
        }
    }
    $conn->close();
    return $projectsArray;
}

function get_popular_projects($amount){
    $projectsArray = array();
    $conn = DB_connectie();
    $sql = "SELECT project.Id, project.Titel, project.Aanmaakdatum, project.Straat, project.Omschrijving FROM tblprojecten project join tblprojectgebruikers user on project.Id = user.ProjectId GROUP BY project.Titel ORDER BY count(user.ProjectId) desc LIMIT ?";

    /*SELECT project.Titel, COUNT( tblprojectgebruikers.ProjectId ) cnt
        FROM tblprojecten project
        INNER JOIN tblprojectgebruikers ON project.ID = tblprojectgebruikers.ProjectId
        GROUP BY project.Titel
        ORDER BY COUNT( tblprojectgebruikers.ProjectId ) DESC
        LIMIT 2
     */
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $amount);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result){
        die('Probleem met de query: ' . $conn->error);
    }
    while($row = $result->fetch_array(MYSQL_ASSOC)){
        $projectsArray[] = projects_item($row["Id"],$row["Titel"], $row["Aanmaakdatum"], $row["Straat"], $row["Omschrijving"]);
    }
    $conn->close();
    $result->close();
    return $projectsArray;
}

function get_project_category(){
    $project_categoryArray = array();
    $project_categoryArray[] = "Planten en decoratie";
    $project_categoryArray[] = "Grote werkzaamheden";
    $project_categoryArray[] = "Vrijwillegerswerk";
    return $project_categoryArray;
}

function get_event_category(){
    $event_categoryArray = array();
    $event_categoryArray[] = "Buurtfeest";
    $event_categoryArray[] = "Bijeenkomst";
    $event_categoryArray[] = "Etentje";
    return $event_categoryArray;
}

function get_citys(){
    $citysArray = array();
    $conn = DB_connectie();
    $sql = "SELECT Id, Gemeente FROM tblsteden";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $citysArray[] = citysList($row["Id"],$row["Gemeente"]);
        }
    }
    $conn->close();
    return $citysArray;
}

function get_events(){
    $eventsArray = array();
    $conn = DB_connectie();
    $sql = "SELECT Id, Titel, Datum, Straat, Omschrijving FROM tblevents";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $eventsArray[] = events_item($row["Id"], $row["Titel"], $row["Datum"],  $row["Straat"], $row["Omschrijving"]);
        }
    }
    $conn->close();
    return $eventsArray;
}

function get_new_events($amount){
    $eventsArray = array();
    $conn = DB_connectie();
    $sql = "SELECT Id, Titel, Datum, Straat, Omschrijving FROM tblevents ORDER BY Id DESC LIMIT ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $amount);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result){
        die('Probleem met de query: ' . $conn->error);
    }
    while($row = $result->fetch_array(MYSQL_ASSOC)){
        $eventsArray[] = events_item($row["Id"], $row["Titel"], $row["Datum"],  $row["Straat"], $row["Omschrijving"]);
    }
    $conn->close();
    $result->close();
    return $eventsArray;
}

function get_news(){
    $newsArray = array();
    $newsArray[] = news_item("Datum", "http://localhost:8080/wp-content/uploads/2015/05/temp.jpg", "Admin", "De reactie tekst");
    $newsArray[] = news_item("Datum", "http://localhost:8080/wp-content/uploads/2015/05/temp.jpg", "Admin", "De reactie tekst");
    $newsArray[] = news_item("Datum", "http://localhost:8080/wp-content/uploads/2015/05/temp.jpg", "Admin", "De reactie tekst");
    $newsArray[] = news_item("Datum", "http://localhost:8080/wp-content/uploads/2015/05/temp.jpg", "Admin", "De reactie tekst");
    return $newsArray;
}

function get_detail_project($id){
    $projectDetailArray = array();
    $projectFotosArray = array();
    $projectGebruikersArray = array();
    $projectEventsArray = array();
    $projectZoekertjesArray = array();
    $projectArtikelsArray = array();
    $projectReactiesArray = array();

    $conn = DB_connectie();

    //PROJECT
    $sql = "SELECT p.Id, p.Titel, p.Omschrijving, p.Aanmaakdatum, p.Looptijd, s.Gemeente, p.Straat, p.Website, u.Gebruikersnaam, c.Naam as Categorie FROM tblprojecten p
            JOIN tblgebruikers u
            ON p.AdminId=u.Id
            JOIN tblsteden s
            ON p.PlaatsId = s.Id
            JOIN tblcategorieen c
            ON p.CategorieId = c.Id
            WHERE p.Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result){
        die('Probleem met de query: ' . $conn->error);
    }
    while($row = $result->fetch_array(MYSQL_ASSOC)){
        $projectDetailArray = project_detail($row["Id"], $row["Titel"], $row["Omschrijving"],  $row["Aanmaakdatum"], $row["Looptijd"], $row["PlaatsId"], $row["Straat"], $row["Website"], $row["Gebruikersnaam"], $row["Categorie"]);
    }

    //REACTIES
    $sql = "SELECT tblReacties.*
            FROM tblProjectReacties
            RIGHT JOIN tblReacties ON tblProjectReacties.ReactieId = tblReacties.Id
            WHERE tblProjectReacties.ProjectId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result){
        die('Probleem met de query: ' . $conn->error);
    }
    while($row = $result->fetch_array(MYSQL_ASSOC)){
        $projectReactiesArray[] = comments_item($row["Aanmaakdatum"],$row["Id"], $row["AdminId"], $row["Omschrijving"],false);
    }

    //FOTOS
    $sql = "SELECT tblfotos.*
            FROM tblprojectfotos
            RIGHT JOIN tblFotos ON tblProjectfotos.FotoId = tblfotos.Id
            WHERE tblprojectfotos.ProjectId =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result){
        die('Probleem met de query: '.$conn->error);
    }
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $projectFotosArray[] = foto_item($row["Id"],$row["Url"],false);
    }

    //LEDEN
    $sql = "SELECT tblgebruikers.*
            FROM tblprojectgebruikers
            RIGHT JOIN tblgebruikers ON tblprojectgebruikers.GebruikerId = tblgebruikers.Id
            WHERE tblprojectgebruikers.ProjectId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result){
        die('Probleem met de query:' .$conn->error);
    }        
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $projectGebruikersArray[] = gebruiker_item($row["Id"],$row["Gebruikersnaam"]);
    }

    //EVENTS
    $sql = "SELECT tblevents.*
            FROM tblprojectevents
            RIGHT JOIN tblevents ON tblprojectevents.EventId = tblevents.Id
            WHERE tblprojectevents.ProjectId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result){
        die('Probleem met de query:' .$conn->error);
    }        
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $projectEventsArray[] = events_item($row["Id"],$row["Titel"],$row["Datum"],getStad($row["PlaatsId"]),$row["Omschrijving"]);
    }

    //ZOEKERTJES
    $sql = "SELECT tblzoekertjes.*
            FROM tblprojectzoekertjes
            RIGHT JOIN tblzoekertjes ON tblprojectzoekertjes.ZoekertjeId = tblzoekertjes.Id
            WHERE tblprojectzoekertjes.ProjectId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result){
        die('Probleem met de query:' .$conn->error);
    }        
    while($row = $result->fetch_array(MYSQLI_ASSOC)){        
        $projectZoekertjesArray[] = ads_item($row["Id"],GetAdFoto($row["Id"]),$row["Titel"],$row["Aanmaakdatum"],$row["Omschrijving"]);
    }

    //ARTIKELS
    $sql = "SELECT tblartikels.*
            FROM tblprojectartikels
            RIGHT JOIN tblartikels ON tblprojectartikels.ArtikelId = tblartikels.Id
            WHERE tblprojectartikels.ProjectId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result){
        die('Probleem met de query:' .$conn->error);
    }        
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $projectArtikelsArray[] = articles_item($row["Id"],$row["Titel"],$row["Aanmaakdatum"],GetCategorie($row["CategoreId"]),$row["Omschrijving"]);
    }

    $conn->close();
    $result->close();

    return array($projectDetailArray, $projectFotosArray, $projectGebruikersArray, $projectEventsArray, $projectZoekertjesArray, $projectArtikelsArray, $projectReactiesArray);
}

function GetCategorie($id)
{
    $conn = DB_connectie();
    $sql = "SELECT Naam FROM tblcategorieen WHERE Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result){
        die('Probleem met de query: '.$conn->error);
    }
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row["Naam"];
}

function GetAdFoto($id)
{
    
   $conn = DB_connectie();
    $sql = "SELECT tblfotos.*
            FROM tblzoekertjefotos 
            RIGHT JOIN tblfotos ON tblzoekertjefotos.FotoId = tblFotos.Id
            WHERE tblzoekertjefotos.ZoekertjeId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result){
        die('Probleem met de query: '.$conn->error);
    }
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row[0]["Url"];
}

function getStad($id)
{
    $conn = DB_connectie();
    $sql = "SELECT Gemeente FROM tblSteden WHERE Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result){
        die('Probleem met de query: '.$conn->error);
    }
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row["Gemeente"];
}

function add_project($title, $description, $date, $runtime, $location, $street, $website, $user, $category){
    $conn = DB_connectie();
    $stmt = $conn->prepare("INSERT INTO tblprojecten(Titel, Omschrijving, Aanmaakdatum, Looptijd, PlaatsId, Straat, Website, AdminId, CategorieId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiissii", $title, $description, $date, $runtime, $location, $street, $website, $user, $category);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function DB_connectie(){
    $servername = "localhost";
    $username = "root";
    $password = "usbw";
    $dbname = "groenestraat";

    $conn = new MYSQLI($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>