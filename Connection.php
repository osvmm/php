<style>
    table, td, th{
        border: 4px solid black;
        font-family: sans-serif;
        font-size: 25px;
        color: yellow;
    }

    td{
        background: #E23D1A;
    }

</style>

<?php
   $user= 'root';
   $pass= '';
   $host = 'localhost';
   $base = 'uczniowie';    //tutaj nazwa twojej bazy
   $con= mysqli_connect($host,$user,$pass, $base);
   mysqli_select_db($con,$base);

   $sql = "SELECT * FROM klasa";
$result = $con->query($sql);
echo "<table>";
echo "<tr>";
echo "<td>";
echo "Numer:";
echo "</td>";
echo "<td>";
echo "Imie:";
echo "</td>";
echo "<td>";
echo "Nazwisko:";
echo "</td>";
echo "<td>";
echo "Hobby:";
echo "</td>";
echo "</tr>";
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<tr>";
echo "<td>";
echo $row["Numer"];
echo "</td>";
echo "<td>";
echo $row["Imie"];
echo "</td>";
echo "<td>";
echo $row["Nazwisko"];
echo "</td>";
echo "<td>";
echo $row["Hobby"];
echo "</td>";
echo "</tr>";
 }
 } else {
echo "0 results";
 }
echo "</table>";

$sql1 = "DELETE FROM klasa WHERE id=$num2";



  
    if(isset($_GET['sub']))
		 {
             $Numer = $_GET['num'];
             $Imie = $_GET['name'];
             $Nazwisko = $_GET['name2'];
             $Hobby = $_GET['hob'];
$query = "Insert into klasa(numer, imie, nazwisko, hobby) values('$Numer', '$Imie', '$Nazwisko','$Hobby')";
$run =mysqli_query($con,$query) or die(mysqli_error());

if($run){
    echo "Formularz zatwierdzony";
}
else{
    echo "formularz jest błędny";
}
         }
         
?>

<form action="" method="get">
Numer:<input type="text" name="num"><br>
Imie:<input type="text" name="name"><br>
Nazwisko:<input type="text" name="name2"><br>
Hobby:<input type="text" name="hob"><br>
<input name="sub" type="submit" value="ok"><br><br>

ID:<input type="number" name="num2"><br>
<input name="del" type="submit" value="Usuń"><br>
</form>
