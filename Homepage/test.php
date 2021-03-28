<html>
<!DOCTYPE html>
<html lang = "en">


    <header>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="dat.css" type="text/css" />
    </header>


<body> 

<?php

    echo "<div id='main'>";

        session_start();
        print_r($_SESSION['privilege']);
        
        if ($_SESSION["privilege"] == "superUser" ||  $_SESSION["privilege"] == "editUser" || $_SESSION["privilege"] == "viewUser") {

            echo "
                <div id= 'mySidebar' class= 'sidebar'>
                <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>×</a>
                <a href='#'>Address</a>
                <a href='#'>Alumni</a>
                <a href='#'>Donated</a>
                <a href='#'>Donation</a>
                <a href='#'>Employer</a>
                <a href='#'>Majored In</a>
                <a href='#'>Minored In</a>
                <a href='#'>Program</a>
                <a href='#'>School</a>
                <a href='#'>Works At</a>
                </div>
            
                <div class='menu'>
                <button class='openbtn' onclick='openNav()'>☰</button>
                <button class='placeholder'>X</button> 
                <button class='placeholder'>X</button>
                <button class='placeholder'>X</button>
                <button class='placeholder'>X</button>
                </div>

            <---  Top right profile button -->
                <div class='profile'>
                    <!-- <button class='button'>  </button> -->
                    <a href='logout.php'>Log Out</a>
        
                </div>

                <br> <br> <br> <br>
            
            
            ";
        }

        // if ($_SESSION["privilege"] == "viewUser"){
            if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
                ;
            }
            else{
                print '<p>ERROR: connecting to MySQL.</p>';
            }

            //Query to return contents of table Alumni here 
            $query="SELECT * FROM Alumni";
            $r=mysqli_query($connection, $query);
                echo "<table id='alumniTable' class='styled-table'>
                    <thead>
                        <tr>
                            <th> Alumni ID </th>
                            <th> Birthdate </th>
                            <th> Status </th>
                            <th> Email </th>
                            <th> Phone Number </th>
                            <th> First Name </th>
                            <th> Middle Name </th>
                            <th> Last Name </th>
                            <th> Street Name </th>
                            <th> City </th>
                            <th> State </th>
                            <th> Country/Region </th>
                            <th> Zipcode </th>
                        </tr>
                    </thead>";

                while($row=mysqli_fetch_array($r)){
                    echo "<tr>";
                    echo "<td>" . $row['alumniID'] . "</td>";
                    echo "<td>" . $row['birthdate'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phoneNumber'] . "</td>";
                    echo "<td>" . $row['firstName'] . "</td>";
                    echo "<td>" . $row['middleName'] . "</td>";
                    echo "<td>" . $row['lastName'] . "</td>";
                    echo "<td>" . $row['streetName'] . "</td>";
                    echo "<td>" . $row['city'] . "</td>";
                    echo "<td>" . $row['state'] . "</td>";
                    echo "<td>" . $row['countryRegion'] . "</td>";
                    echo "<td>" . $row['zipcode'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

                mysqli_close($connection);
    echo "</div>";

        // }

    
    // this is apart of the search bar 
    // if ($_SESSION["privilege"] == "viewUser"){
    //    " <div align='center' >

    //     <select class='inputTable' data-target='.tableSelect'  name='inputTable'>
    //         <option value='alumniID' data-show='.alumniID'>Alumni ID</option>
    //         <option value='birthdate' data-show='.birthdate'>Birthdate</option>
    //         <option value='status' data-show='.status'>Status</option>
    //         <option value='email' data-show='.email'>Email</option>
    //         <option value='phoneNumber' data-show='.phoneNumber'>Phone Number</option>
    //         <option value='firstName' data-show='.firstName'>First Name</option>
    //         <option value='middleName' data-show='.middleName'>Middle Name</option>
    //         <option value='lastName' data-show='.lastName'>Last Name</option>
    //         <option value='streetName' data-show='.streetName'>Street Name</option>
    //         <option value='city' data-show='.city'>City</option>
    //         <option value='state' data-show='.state'>State</option>
    //         <option value='countryRegion' data-show='.countryRegion'>Country/Region</option>
    //         <option value='zipcode' data-show='.zipcode'>Zipcode</option>
    //     </select>
        
    //     <!-- search bar -->
    //     <div class='tableSelect' id = tableTest>
    //         <div class='alumniID hide'><input type='text' id='alumniIDInput' class='box' onkeyup='filterTable(this);' name='alumniID' placeholder='Search for Alumni ID...'></div>
    //         <div class='birthdate hide'><input type='text' id='birthdateInput' class='box' onkeyup='filterTable(this);' name='birthdate' placeholder='Search for Birthdate...'></div>
    //         <div class='status hide'><input type='text' id='statusInput' class='box' onkeyup='filterTable(this);' name='status' placeholder='Search for Status...'></div>
    //         <div class='email hide'><input type='text' id='emailInput' class='box' onkeyup='filterTable(this);' name='email' placeholder='Search for Email...'></div>
    //         <div class='phoneNumber hide'><input type='text' id='phoneNumberInput' class='box' onkeyup='filterTable(this);' name='phoneNumber' placeholder='Search for Phone Number...'></div>
    //         <div class='firstName hide'><input type='text' id='firstNameInput' class='box' onkeyup='filterTable(this);' name='firstName' placeholder='Search for First Name...'></div>
    //         <div class='middleName hide'><input type='text' id='middleNameInput' class='box' onkeyup='filterTable(this);' name='middleName' placeholder='Search for Middle Name...'></div>
    //         <div class='lastName hide'><input type='text' id='lastNameInput' class='box' onkeyup='filterTable(this);' name='lastName' placeholder='Search for Last Name...'></div>
    //         <div class='streetName hide'><input type='text' id='streetNameInput' class='box' onkeyup='filterTable(this);' name='streetName' placeholder='Search for Street Name...'></div>
    //         <div class='city hide'><input type='text' id='cityInput' class='box' onkeyup='filterTable(this);' name='city' placeholder='Search for City...'></div>
    //         <div class='state hide'><input type='text' id='stateInput' class='box' onkeyup='filterTable(this);' name='state' placeholder='Search for State...'></div>
    //         <div class='countryRegion hide'><input type='text' id='countryRegionInput' class='box' onkeyup='filterTable(this);' name='countryRegion' placeholder='Search for Country/Region...'></div>
    //         <div class='zipcode hide'><input type='text' id='zipcodeInput' class='box' onkeyup='filterTable(this);' name='zipcode' placeholder='Search for Zipcode...'></div>
    //     </div>
    // </div>
    // ";

    // }

    // if ($_SESSION["privilege"] == "superUser") {
        
    //     echo "<div class='crud >
    //     <a href='animalsRemove.php'>Delete</a>
    //     <a href='animalsUpdate1.php'>Update</a>
    //     <a href='animalsAdd.php'>Add</a>
    //     </div>";
    // }else if ($_SESSION["privilege"] == "editUser"){
    //     echo "editUser";

    // }else if ($_SESSION["privilege"] == "viewUser"){
    //     echo "viewUser";

    // }


?>

     
 <div class="profile">
    <!-- <button class="button">  </button> -->
    <a href='logout.php'>Log Out</a>


 </div>

    </body> 


    <script>
            function openNav() {
                document.getElementById("mySidebar").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";

            }

            function closeNav() {
                document.getElementById("mySidebar").style.width = "0";
                document.getElementById("main").style.marginLeft= "0";

            }
        </script>
           
</html>
