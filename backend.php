﻿
<?php

$con = mysqli_connect("localhost", "root", "", "dblab_project");

if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($con, "utf8");

$q = $_REQUEST["q"];

// $result_array = array();

if ($q !== "") {
  if ($q == "asatid") {
    $result = mysqli_query($con, "SELECT First_Name,Last_Name,Instrument_Name FROM masters");
    while ($data = mysqli_fetch_row($result)) {
      echo "<tr>";
      echo "<td class='text-center'>" . $data[2] . "</td>";
      echo "<td class='text-center'>" . $data[1] . "</td>";
      echo "<td class='text-center'>" . $data[0] . "</td>";
      echo "</tr>";
    }
  }
}


if ($q !== "") {
  if ($q == "term") {
    $result = mysqli_query($con, "SELECT Instrument_Name,Session_Count,Session_Price,Session_Time FROM Term");
    while ($data = mysqli_fetch_row($result)) {
      echo "<tr>";
      echo "<td class='text-center'>" . $data[3] . "</td>";
      echo "<td class='text-center'>" . $data[2] . "</td>";
      echo "<td class='text-center'>" . $data[1] . "</td>";
      echo "<td class='text-center'>" . $data[0] . "</td>";
      echo "</tr>";
    }
  }
}


if ($q !== "") {
  if ($q == "class") {
    $result = mysqli_query($con, "SELECT Instrument_Name,cmaster FROM Class");
    while ($data = mysqli_fetch_row($result)) {
      echo "<tr>";
      echo "<td class='text-center'>" . $data[1] . "</td>";
      echo "<td class='text-center'>" . $data[0] . "</td>";
      echo "</tr>";
    }
  }
}


if ($q !== "") {
  if ($q == "registration") {
    $sql = mysqli_query($con, "INSERT INTO Student (First_Name,Last_Name,Birth_Date,National_Code,Phone,Address,Instrument_Name,spassword) VALUES('$_POST[Firstname]','$_POST[Lastname]','$_POST[BirthDate]','$_POST[NationalCode]','$_POST[Phonen]','$_POST[Addr]','$_POST[Instru]','$_POST[spass]')");
    /// check tekrari
  }
}

////////////////////// login
if ($q !== "") {
  if ($q == "login") {
    $uname = $_POST['Username'];
    $pass = $_POST['Password'];
    $sql = ("SELECT * FROM Student WHERE National_Code=$uname");
    $result = mysqli_query($con, $sql);
    if (!$result) {
?>
      <script type="text/javascript">
        document.getElementById("error-form-login").innerHTML = "خطا";
      </script>
      <?php
    } else {
      $count = mysqli_num_rows($sql);
      if ($count === 0) {
        $sql2 = ("SELECT * FROM admins WHERE National_Code=&uname");
        $result1 = mysqli_query($con, $sql2);
        if (!$result1) {
      ?>
          <script type="text/javascript">
            document.getElementById("error-form-login").innerHTML = "خطا";
          </script>
          <?php
        } else {
          $count = mysqli_num_rows($sql2);
          if ($count === 0) {
          ?>
            <script type="text/javascript">
              document.getElementById("error-form-login").innerHTML = "نام کاربری یا رمز عبور اشتباه است";
            </script>
            <?php
          } else {
            if (password_verify($pass, $result1['apassword'])) {
            ?>
              <script type="text/javascript">
                window.location = "index3.html";
              </script>
              <?php
            } else {
              if (password_verify($pass, $result['spassword'])) {
              ?>
                <script type="text/javascript">
                  window.location = "index2.html";
                </script>
<?php
              }
            }
          }
        }
      }
    }
  }
}


if ($q !== "") {
  if ($q == "class-admin") {
    $result = mysqli_query($con, "SELECT EID,Instrument_Name,cmaster,day,hour FROM Class");
    while ($data = mysqli_fetch_row($result)) {
      echo "<tr>";
      echo "<td class='text-center'>" . $data[4] . "</td>";
      echo "<td class='text-center'>" . $data[3] . "</td>";
      echo "<td class='text-center'>" . $data[2] . "</td>";
      echo "<td class='text-center'>" . $data[1] . "</td>";
      echo "<td class='text-center'>" . $data[0] . "</td>";
      echo "</tr>";
    }
  }
}


if ($q !== "") {
  if ($q == "asatid-admin") {
    $result = mysqli_query($con, "SELECT EID,First_Name,Last_Name,Instrument_Name,Salary,National_Code,Phone,Entrance_Date,Insurance_Num FROM masters");
    while ($data = mysqli_fetch_row($result)) {
      echo "<tr>";
      echo "<td class='text-center'>" . $data[8] . "</td>";
      echo "<td class='text-center'>" . $data[7] . "</td>";
      echo "<td class='text-center'>" . $data[6] . "</td>";
      echo "<td class='text-center'>" . $data[5] . "</td>";
      echo "<td class='text-center'>" . $data[4] . "</td>";
      echo "<td class='text-center'>" . $data[3] . "</td>";
      echo "<td class='text-center'>" . $data[2] . "</td>";
      echo "<td class='text-center'>" . $data[1] . "</td>";
      echo "<td class='text-center'>" . $data[0] . "</td>";
      // echo "<td class='text-center'> - </td>";
      echo "</tr>";
    }
  }
}

if ($q !== "") {
  if ($q == "term-admin") {
    $result = mysqli_query($con, "SELECT EID, Instrument_Name,Session_Count,Session_Price,Session_Time FROM Term");
    while ($data = mysqli_fetch_row($result)) {
      echo "<tr>";
      echo "<td class='text-center'>" . $data[4] . "</td>";
      echo "<td class='text-center'>" . $data[3] . "</td>";
      echo "<td class='text-center'>" . $data[2] . "</td>";
      echo "<td class='text-center'>" . $data[1] . "</td>";
      echo "<td class='text-center'>" . $data[0] . "</td>";
      echo "</tr>";
    }
  }
}

if ($q !== "") {
  if ($q == "honarjo-admin") {
    $result = mysqli_query($con, "SELECT First_Name,Last_Name,Instrument_Name,Birth_Date,National_Code,Phone,Address FROM student");
    while ($data = mysqli_fetch_row($result)) {
      echo "<tr>";
      echo "<td class='text-center'>" . $data[6] . "</td>";
      echo "<td class='text-center'>" . $data[5] . "</td>";
      echo "<td class='text-center'>" . $data[4] . "</td>";
      echo "<td class='text-center'>" . $data[3] . "</td>";
      echo "<td class='text-center'>" . $data[2] . "</td>";
      echo "<td class='text-center'>" . $data[1] . "</td>";
      echo "<td class='text-center'>" . $data[0] . "</td>";
      echo "</tr>";
    }
  }
}





if ($q !== "") {
  if ($q == "searchAsatid") {
    echo file_get_contents("index4.html");
    $search_EID=$_POST['search_key'];
    $result = mysqli_query($con, "SELECT EID,First_Name,Last_Name,Instrument_Name,Salary,National_Code,Phone,Entrance_Date,Insurance_Num FROM masters WHERE EID=$search_EID");
    while ($data = mysqli_fetch_row($result)) {
      echo "<div class='table-title'>";
      echo "<h3>اساتید</h3>";
      echo "</div>";
      echo "<table class='table-fill'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th class='text-center'>شماره بیمه</th>";
      echo "<th class='text-center'>تاریخ ورود</th>";
      echo "<th class='text-center'>تلفن</th>";
      echo "<th class='text-center'>کد ملی</th>";
      echo "<th class='text-center'>حقوق</th>";
      echo "<th class='text-center'>ساز</th>";
      echo "<th class='text-center'>نام خانوادگی</th>";
      echo "<th class='text-center'>نام</th>";
      echo "<th class='text-center'>EID</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody class='table-hover asatid-table'>";
      echo "<tr>";
      echo "<td class='text-center'>" . $data[7] . "</td>";
      echo "<td class='text-center'>" . $data[6] . "</td>";
      echo "<td class='text-center'>" . $data[5] . "</td>";
      echo "<td class='text-center'>" . $data[4] . "</td>";
      echo "<td class='text-center'>" . $data[3] . "</td>";
      echo "<td class='text-center'>" . $data[2] . "</td>";
      echo "<td class='text-center'>" . $data[1] . "</td>";
      echo "<td class='text-center'>" . $data[0] . "</td>";
      echo "</tr>";
      echo "</tbody>";
      echo "</table>";
    }
    // header("Refresh:0; url=index3.html#section1");
  }
}


if ($q !== "") {
  if ($q == "searchHonarjo") {
    echo file_get_contents("index4.html");
    $search_lastname=$_POST['search_key'];
    $result = mysqli_query($con, "SELECT First_Name,Last_Name,Instrument_Name,Birth_Date,National_Code,Phone,Address FROM student WHERE SID=$search_lastname");
    while ($data = mysqli_fetch_row($result)) {
      echo "<div class='table-title'>";
      echo "<h3>هنرجو</h3>";
      echo "</div>";
      echo "<table class='table-fill'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th class='text-center'>آدرس </th>";
      echo "<th class='text-center'>تلفن </th>";
      echo "<th class='text-center'>کد ملی</th>";
      echo "<th class='text-center'>تاریخ تولد</th>";
      echo "<th class='text-center'>ساز</th>";
      echo "<th class='text-center'>نام خانوادگی</th>";
      echo "<th class='text-center'>نام</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody class='table-hover asatid-table'>";
      echo "<tr>";
      echo "<td class='text-center'>" . $data[6] . "</td>";
      echo "<td class='text-center'>" . $data[5] . "</td>";
      echo "<td class='text-center'>" . $data[4] . "</td>";
      echo "<td class='text-center'>" . $data[3] . "</td>";
      echo "<td class='text-center'>" . $data[2] . "</td>";
      echo "<td class='text-center'>" . $data[1] . "</td>";
      echo "<td class='text-center'>" . $data[0] . "</td>";
      echo "</tr>";
      echo "</tbody>";
      echo "</table>";
    }
    // header("Refresh:0; url=index3.html#section1");
  }
}



if ($q !== "") {
  if ($q == "addToAsatid") {
    $sql = mysqli_query($con, "INSERT INTO masters (EID,First_Name,Last_Name,Instrument_Name,Salary,National_Code,Phone,Entrance_Date,Insurance_Num) VALUES('$_POST[EID]','$_POST[Firstname]','$_POST[Lastname]','$_POST[Instrument]','$_POST[Salary]','$_POST[National_Code]','$_POST[Phone]','$_POST[Entrance_Date]','$_POST[Insurance_Num]')");
    // $sql = mysqli_query($con, "INSERT INTO Student (First_Name,Last_Name,Birth_Date,National_Code,Phone,Address,Instrument_Name,spassword) VALUES('$_POST[Firstname]','$_POST[Lastname]','$_POST[BirthDate]','$_POST[NationalCode]','$_POST[Phonen]','$_POST[Addr]','$_POST[Instru]','$_POST[spass]')");
    header("Refresh:0; url=index3.html#section1");
  }
}

if ($q !== "") {
  if ($q == "deleteAsatid") {
    $EID_DEL=$_POST['EID'];
    $sql = mysqli_query($con, "DELETE FROM masters WHERE EID = $EID_DEL");
    header("Refresh:0; url=index3.html#section1");
  }
}

if ($q !== "") {
  if ($q == "addToClass") {
    $sql = mysqli_query($con, "INSERT INTO class (EID, Instrument_Name,cmaster,day,hour) VALUES('$_POST[EID]','$_POST[Instrument]','$_POST[cmaster]','$_POST[day]','$_POST[hour]')");
    // $sql = mysqli_query($con, "INSERT INTO Student (First_Name,Last_Name,Birth_Date,National_Code,Phone,Address,Instrument_Name,spassword) VALUES('$_POST[Firstname]','$_POST[Lastname]','$_POST[BirthDate]','$_POST[NationalCode]','$_POST[Phonen]','$_POST[Addr]','$_POST[Instru]','$_POST[spass]')");
    header("Refresh:0; url=index3.html#section2");
  }
}

if ($q !== "") {
  if ($q == "deleteClass") {
    $EID_DEL=$_POST['EID'];
    $sql = mysqli_query($con, "DELETE FROM class WHERE EID = $EID_DEL");
    header("Refresh:0; url=index3.html#section2");
  }
}

if ($q !== "") {
  if ($q == "addToTerm") {
    $sql = mysqli_query($con, "INSERT INTO term (EID, Instrument_Name,Session_Count,Session_Price,Session_Time) VALUES('$_POST[EID]','$_POST[Instrument]','$_POST[SCount]','$_POST[SPrice]','$_POST[STime]')");
    // $sql = mysqli_query($con, "INSERT INTO Student (First_Name,Last_Name,Birth_Date,National_Code,Phone,Address,Instrument_Name,spassword) VALUES('$_POST[Firstname]','$_POST[Lastname]','$_POST[BirthDate]','$_POST[NationalCode]','$_POST[Phonen]','$_POST[Addr]','$_POST[Instru]','$_POST[spass]')");
    header("Refresh:0; url=index3.html#section3");
  }
}

if ($q !== "") {
  if ($q == "deleteTerm") {
    $EID_DEL=$_POST['EID'];
    $sql = mysqli_query($con, "DELETE FROM term WHERE EID = $EID_DEL");
    header("Refresh:0; url=index3.html#section3");
  }
}

if ($q !== "") {
  if ($q == "addToHonarjo") {
    $sql = mysqli_query($con, "INSERT INTO Student (First_Name,Last_Name,Birth_Date,National_Code,Phone,Address,Instrument_Name,spassword) VALUES('$_POST[Firstname]','$_POST[Lastname]','$_POST[BirthDate]','$_POST[NationalCode]','$_POST[Phonen]','$_POST[Addr]','$_POST[Instru]','$_POST[spass]')");
    header("Refresh:0; url=index3.html#section4");
  }
}


 if ($q !== "") {
   if ($q == "deleteHonarjo") {
     $search_Natinalcode=(int)$_POST['natinalcode'];
     $sql = mysqli_query($con, "DELETE FROM student WHERE National_Code = $search_Natinalcode");
     header("Refresh:0; url=index3.html#section4");
   }
 }







// backup این کلش باید تو اون ایفایی که مینویسی باشه 
<?php
این موارد این باید مث مال خودمون بشه اون اخریش آدرسیه که بکاپ میگیره$command='mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ' .$mysqlExportPath;
exec($command,$output=array(),$worked);
switch($worked){
case 0:
echo 'The database <b>' .$mysqlDatabaseName .'</b> was successfully stored in the following path '.getcwd().'/' .$mysqlExportPath .'</b>';
break;
case 1:
echo 'An error occurred when exporting <b>' .$mysqlDatabaseName .'</b> zu '.getcwd().'/' .$mysqlExportPath .'</b>';
break;
case 2:
echo 'An export error has occurred';
break;
}

// restore این کلش باید تو اون ایفایی که مینویسی باشه
$command='mysql -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' < ' .$mysqlImportFilename;
exec($command,$output=array(),$worked);
switch($worked){
case 0:
echo 'The data from the file <b>' .$mysqlImportFilename .'</b> were successfully imported into the database <b>' .$mysqlDatabaseName .'</b>';
break;
case 1:
echo 'An error occurred during the import. Please check if the file is in the same folder as this script. ';
break;
}





mysqli_close($con);
