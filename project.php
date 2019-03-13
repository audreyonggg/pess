<style>
* {box-sizing: border-box}
body {font-family: Arial, Helvetica, sans-serif;}

.navbar {
  width: 100%;
  background-color: #4AC2EA;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
  width: 25%; /* Four links of equal widths */
  text-align: center;
}

.navbar a:hover {
  background-color: #AEDCEC;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>
<div align="center">
<h2><a href="project.php">Police Emergency Service System</a></h2>
</div>

<div class="navbar">
  <a href="logcall.php"><font color="#000000">Log call</font></a> 
  <a href="update.php"><font color="#000000">Update</font></a> 
  <a href="signin.php"><font color="#000000">Sign In</font></a> 
  <a href="signout.php"><font color="#000000">Sign Out</font></a>
</div>

<br>

