<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
    crossorigin="anonymous"
  />

  <style>

@import url('https://fonts.googleapis.com/css2?family=Indie+Flower&family=Patrick+Hand&display=swap');

    html, body{
    margin: 0;
    padding: 0;
    background-color: #d2b48c;
}


#col1{
    background-color: #98fb98;
    padding-bottom: 500px;
    padding-top: 20px;
    color:#007400;
    border-radius: 50px;
    margin-left: 1px;
}

#col2{
    background-color: #ffdab9;
    padding-bottom: 500px;
    padding-top: 20px;
    color:#974700;
    border-radius: 50px;
}

#col3{
    
    background-color: #d87093;
    padding-bottom: 500px;
    padding-top: 20px;
    color:#6d0024;
    border-radius: 50px;
}

#navbar img {
            display: block;
            width: 100%;
            height: 200px;
            margin: auto;}

 header{
  float: right;
}

.card-text{
  font-family: 'Indie Flower', cursive;
}
.btn{
  font-family: 'Patrick Hand', cursive;
  font-size: large;
}


    </style>






</head>
<?php


include ('connect.php');

if (isset($_POST['Register']))
{
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Gender = $_POST['Gender'];
    $Age = $_POST['Age'];
    $Email = $_POST['Email'];
    $User = $_POST['User'];
    $Password = $_POST['Password'];


    $sql = "INSERT INTO userinfo VALUES ('','$Fname','$Lname','$Gender','$Age','$Email','$User','$Password')";

    mysqli_query($connect,$sql);

    session_start();

    $_SESSION['Fname'] = $Fname;
    $_SESSION['Lname'] = $Lname;
    $_SESSION['Gender'] = $Gender;
    $_SESSION['Age'] = $Age;
    $_SESSION['Email'] = $Email;
    $_SESSION['User'] = $User;

    header ('location: home.php');
    exit ();

}

if (isset($_POST['Login']))
{


    $User = $_POST['User'];
    $Password = $_POST['Password'];

    $sql = "SELECT * FROM userinfo WHERE User = '$User' ";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
    $numrow = mysqli_num_rows($result);

    if ($numrow > 0)
    {

        $dbpassword = $row['Password'];

        if ($Password == $dbpassword)
        {
            session_start();
            $_SESSION['Fname'] = $row['Fname'];
            $_SESSION['Lname'] = $row['Lname'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['Age'] = $row['Age'];
            $_SESSION['Gender'] = $row['Gender'];
            $_SESSION['User'] = $row['User'];

            header ('location: home.php');
            exit ();

        }

        else

        {
            echo 'Mali ka Kupal.';
        }

    }

    else
    {
        echo 'Ang iyong Username ay wala pa sa aming listahan hahahahah';
        echo '<br />';

    }

}


?>
<body>  
    
<header class="m-3">
<!-- Button trigger modal for SIGNUP -->
<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
 SIGNUP
</button>
/
<!-- Button trigger modal for LOGIN -->
<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal2">
  LOGIN
</button>
</header>

<nav id="navbar">
        <img src="title.png" alt="Logo image">
    </nav>

<!-- Sign UP -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign UP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="index.php" method="POST" class="row g-3 needs-validation" novalidate>
                                  
                                  <div class="col-lg-6 col-md-6">
                                    <label for="validationCustom01" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="Fname" required>
                                    <div class="valid-feedback">
                                      Looks good!
                                    </div>
                                  </div>

                                  <div class="col-lg-6 col-md-6">
                                    <label for="validationCustom02" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="validationCustom02"  name="Lname"  required>
                                    <div class="valid-feedback">
                                      Looks good!
                                    </div>
                                  </div>
  
                                  
                                  <div class="col-lg-8 col-md-6">
                                    <label for="validationCustom03" class="form-label">Email Address</label>
                                    <input type="text" class="form-control" id="validationCustom03" name="Email"  required>
                                    <div class="invalid-feedback">
                                      Please provide a valid Email Address.
                                    </div>
                                  </div>

                                  <div class="col-lg-4 col-md-6">
                                    <label for="validationCustom03" class="form-label">Age</label>
                                    <input type="text" class="form-control" id="validationCustom03" name="Pnumber"  required>
                                    <div class="invalid-feedback">
                                      Please provide a valid Age.
                                    </div>
                                  </div>

                                  <div class="col-lg-12 col-md-12">
                              <label for="validationCustom04" class="form-label">Gender</label>
                              <select class="form-select" id="validationCustom04" name="Gender"  required>
                                <option selected disabled value="">Choose...</option>
                                <option >Male</option>
                                <option >Female</option>
                              </select>
                              <div class="invalid-feedback">
                                Please select your Gender.
                              </div>
                            </div>

                                  <div class="col-lg-6 col-md-6">
                                    <label for="validationCustom03" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="validationCustom03" name="User"  required>
                                    <div class="invalid-feedback">
                                      Please provide a Username.
                                    </div>
                                  </div>

                                  <div class="col-lg-6 col-md-6">
                                    <label for="validationCustom03" class="form-label">Password</label>
                                    <input type="Password" class="form-control" id="validationCustom03" name="Password"  required>
                                    <div class="invalid-feedback">
                                      Please provide a Password.
                                    </div>
                                  </div>

         
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="Register">Register</button>
                </div>

        </form>
      </div>
    
    </div>
  </div>
</div>

<!--LOGIN-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign UP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="index.php" method="POST">
                <p> Log-in </p>
                <input type="text" name="User" placeholder="Username" required/>
                <input type="Password" name="Password" placeholder="Password" required/><br /> <br />
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="Login">Login</button>
                  </div>

        </form>
      </div>
    </div>
  </div>
</div>




    <div class="container-fluid">

        <div class="row">
  
          <div class="col-xl-4 col-lg-4 col-md-6 my-2" >
            <div class="card border-0  shadow mb-5  rounded-circle">
              
              <div class="card-body" id="col1">
                <a href="picture.html" class="card-title card-link text-center text-dark" id="card-link">
                  <h1 class="font-weight-bolder">BEGINNER</h1></a>
                <p class="card-text text-center ">
                  some more texts
                </p>
               
              </div>
            </div>
          </div>
  
          <div class="col-xl-4 col-lg-4 col-md-6 my-2">
            <div class="card border-0 shadow mb-5  rounded-circle ">
             
              <div class="card-body" id="col2">
                 <a href="video.html" class="card-title card-link text-center text-dark" id="card-link">
                   <h1 class="font-weight-bolder" >INTERMEDIATE</h1></a>
                <p class="card-text text-center">
                  some more texts
                </p>
             
              </div>
            </div>
          </div>
  
          <div class="col-xl-4 col-lg-4 col-md-6 my-2">
            <div class="card border-0 shadow mb-5  rounded-circle ">
              
              <div class="card-body" id="col3">
                 <a href="video.html" class="card-title card-link text-center text-dark" id="card-link">
                   <h1 class="font-weight-bolder" >ADVANCED</h1></a>
                <p class="card-text text-center">
                  some more texts
                </p>
             
              </div>
            </div>
          </div>
  
  
        </div>
  
      </div>
    
  
  









</body>

<script
src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin="anonymous"
></script>
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"
></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>