<!DOCTYPE html>
<html>
    <head>
    <script>
        function selectState(str) {
  
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    var response=JSON.parse (this.responseText);
                    response.forEach((obj, index) => {
                       var opt = document.createElement("option");
                      opt.setAttribute("value",obj.id);
                       opt.innerText= obj.name;
                       document.getElementById("state").appendChild(opt);
                    });
                    }
            };
            xmlhttp.open("GET","stateapi.php?country_id="+str,true);
            xmlhttp.send();
        }

        function selectCity(str) {
  
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("city").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","cityapi.php?state_id="+str,true);
            xmlhttp.send();
        }

</script>
    </head>
    <body>
        <?php
            include '../myFiles/connection.php';
            $selectCountry = "SELECT * FROM `tbl_countries`";
            $countryRes = mysqli_query($conn,$selectCountry);
        ?>
        <table>
            <tr>
                <td><select name="country" id="country" onchange="selectState(this.value)">
                        <option value="">Select Country</option>
                        <?php 
                            while($countryData = mysqli_fetch_array($countryRes)){?>
                                <option value="<?php echo $countryData['id']?>"><?php echo $countryData['name']?></option>
                            <?php }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td><select name="state" id="state" style="width:100%;" onchange="selectCity(this.value)">
                        <option value="">Select State</option>
                    </select></td>
            </tr>
            <tr>
                <td><select name="city" id="city" style="width:100%;">
                        <option value="">Select City</option>
                    </select></td>
            </tr>
        </table>
    </body>
</html>