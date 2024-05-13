<?php
include('connectn.php');
if(isset($_POST['submit']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $uname=$_POST['uname'];
    $pwd=$_POST['pwd'];
    $query=mysqli_query($conn, "insert into form(First name, Last name, Username, Password) values('$fname', '$lname', '$uname', '$pwd')");
    if($query)
    {
        echo "<script> alert('Data entered successfully') </script>";
    }
    else
    {
        echo "<script> alert('error insertion') </script>";
    }
}
?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="contact.css" rel="stylesheet"></link>
</head>
<body>
<header>
  <div class="header">
    <h3>Univerity Of Victoria</h3>
    <ul class="navbar">
      <li><a href="#Home">Home</a></li>
      <li><a href="#Registration">Registration</a></li>
      <li><a href="#Member">Member</a></li>
      <li style="float:right"><a class="active" href="#contact">Contact Us</a></li>
    </ul>
</header>
</div>

<div class="row">
<div class="leftcolumn">
  <div class="card">
    <h2>RECRUITMNT ASSISTANCE</h2>
    <p style="text-align: left;">Our various services are designed to meet your organization’s diverse needs. We can streamline your recruitment process, whatever your company size, geographical scope or sector affiliation (public or private). We’ll help you find the ideal candidate.</p>
    <H2>GENERAL INQUIRIES</H2>
    <p>If you cannot find what you are looking for in the links provided above or on the University of Alberta website, you can contact the switchboard for assistance. Please note that wait times may vary based on call volumes.</p>
    <!-- <div class="fakeimg" style="height:200px;">Image</div> -->
    <p><img src="college.jpg" alt="college Image" width="500px"></p>
    <p><img src="graduation.jpg" alt="grad image" width="500px"></p>
  </div>
  <!-- <div class="card1">
    <h2>CO-OP EMPLOYERS</h2>
    <h5>Co-operative education is a three-way partnership between the University, students and employers. Students apply their classroom knowledge in a series of four-month work terms. You, the employer, will be enhancing a student’s training while reaping the unique benefits of hiring through the CO-OP program. </h5>
    <!-- <div class="fakeimg" style="height:200px;"></div> -->
    <!-- <h2>MAILING ADDRESS</h2>
    <pre id="main-add">Mail addressed to the University may be formatted as follows:
      Univerity of Alberta
      Department name
      Building room and Number
      Attention: Contact Person
      116 St and 85 Ave
      Edmonton, Alberta
      T6G 2R3</pre> -->
  <!-- </div> -->
</div>
<div class="rightcolumn">
  <div class="card">
    <h2>Directory of offices and services</h2>
    <p>Emergency contact information</p>
    <p>Alumni Relations</p>
    <p>Office of Advancement</p>
    <p>Accessibility</p>
  </div>
  <div class="card">
    <h3>Directory of Faculties and Academic units</h3>
    <div class="fakeimg">Centre for Accounting & Education</div><br>
    <div class="fakeimg">Centre for Bioengineering & Biotechnology</div><br>
    <div class="fakeimg">Centre for Computer Engineering</div>
  </div>
  <div class="card">
    <h3>Contact our career concern team</h3>
    <p>News</p>
    <p>Career</p>
    <p>Feeback</p>
  </div>
  <div class="card">
    <h2>Contact us for part time learning</h2>
    <p>Health insurance</p>
    <p>Immigration</p>
    <p>Admissions</p>
    <p>Application forms</p>
  </div>
</div>
</div>

<div class="footer">
<h2><form method="POST">
  <h1>For more information fill out this form!</h1>
  <label>First name</label> 
  <input type="text" name="fname" placeholder="Enter your first name"><br>
  <label>Last name</label>
  <input type="text" name="lname" placeholder="Enter your last name"> <br>
  <label>Username</label> 
  <input type="text" name="uname" placeholder="Enter your username"> <br>
  <label>Password</label>
  <input type="password" name="pwd" placeholder="Enter your password"><br>
  <button type="submit" name="submit">Submit</button>
  <button type="submit" name="submit">Cancel</button>
</form></h2>
</div>
</body>
</html>
