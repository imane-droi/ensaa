<html>
<head>
<style>
#my-menu  {
  width: 300px;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  background-color: #F1F1F1;
  padding: 20px;
  box-sizing: border-box;
  border-right: 1px solid #CCC;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  align-items: left;
  justify-content: center;
}

ul li {
  padding: 5px 0;
  margin: 20px 0;
}

ul li a {
  font-size: 1.1em;
  color: #2B2B2B;
  text-decoration: none;
}

ul li a:hover {
  color: #4CAF



  </style>
</head>

<div id="my-menu" style="width:200px; height:100%; position:fixed; top:0; left:0; background-color:#f1f1f1;">
  <ul style="list-style-type:none; padding:0; margin:0;">
    <li><a href="edit_profile.php">Modifier votre profil</a></li>
    <li><a href="add_teachers.php">Ajouter enseignants</a></li>
    <li><a href="add_programs.php">Ajouter les filières</a></li>
    <li><a href="add_semesters.php">Ajouter les semestres</a></li>
    <li><a href="add_modules.php">Ajouter les modules</a></li>
    <li><a href="add_groups.php">Ajouter les groupes</a></li>
    <li><a href="add_rooms.php">Ajouter les salles</a></li>
    <li><a href="dashboard.php">Le tableau de bord</a></li>
    <li><a href="index.php">logout</a></li>
  </ul>
</div>
</html>