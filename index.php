<html>
 <head>
  <meta charset="utf-8">
  <title>Zadanie</title>
 </head>
 <body>
  <div ng-app="myApp" ng-controller="customersCtrl">
 </div>
 <h1>Zadanie uczen i nauczyciel</h1><br/><br/>
    <h2>Tabela Nauczyciel</h2>
  <table border="1">
   <tr>
       <th>klasa</th><th>temat</th><th>tresc</th><th>data_i_godzina</th><th>data_i_godzina_oddania</th>
   </tr>
<?php
include "polacz.php";
if ($sql =  $baza->prepare("SELECT * FROM nauczyciel ORDER BY klasa"))
{
        $sql->execute();
        $sql->bind_result($klasa, $temat, $tresc, $data_i_godzina, $data_i_godzina_oddania);
        while ($sql->fetch())
        {
                echo "<tr>
                        <td>$klasa</td>
                        <td>$temat</td>
                        <td>$tresc</td>
                        <td>$data_i_godzina</td>
                        <td>$data_i_godzina_oddania</td>
                        <td><a href=\"usun.php?klasa=$klasa\" onclick=\"javascript:return confirm('Czy na pewno usunąć?'); \">Usuń</a></td>
                   </tr>";
            
        }
        $sql->close();
 }
else die( "Błąd w zapytaniu SQL! Sprawdź kod SQL w PhpMyAdmin." );

 $baza->close();
?>
  </table>
  <a href="dodaj.php">Dodawanie nowego</a>
     <script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
                $http.get("json_select.php")
                .success(
                  function(data, status, headers, config){
                        $scope.klasa=data;
                });
        });
  </script>
 </body>
</html>