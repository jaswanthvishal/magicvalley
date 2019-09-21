<?php
//index.php

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Coust review</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
 <h2 align="center"><a href="#">Reviews</a></h2>
  <br />
  <div class="container">
   <form method="POST" id="comment_form"  action="server.php" >
    <div class="form-group">
     <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" />
    </div>
    <div class="form-group">
     <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
    </div>
    <div class="form-group">
     <input type="hidden" name="comment_id" id="comment_id" value="0" />
     <input type="submit" name="submit" id="submit" onclick="submitForm()" class="btn btn-info" value="Submit" />
    </div>
   </form>
   <span id="comment_message"></span>
   <br />
   <div id="display_comment"></div>
  </div>
    <?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "tbl_comment1";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT comment_id, comment_sender_name, comment FROM tbl_comment";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        echo "<br> id: ". $row["comment_id"]. " - Name: ". $row["comment_sender_name"]."<br>". "Comment " . $row["comment"] . "<br>";
    }
} else {
    echo "0 reviews";
}
$conn->close();
?> 
 </body>
</html>


