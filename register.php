<!DOCTYPE html>
<html>

<head>
    <title>Contact</title>
    <meta charset="utf-8">
    <link href="css/stylesheet.css" rel="stylesheet">
</head>
<?php
            // DEBUGGING ERRORS:
            // Displays any errors that occur to the web page rather than
            // placing them into a log file need to comment out before turning in.
           ini_set('display_error', 1);
           error_reporting(-1); 
           require 'callQuery.php';  
           require 'sanitize.php';
           require 'dbConnect.php';
?>
<body>
	<header>
	    <img id= "logo" src="images/BedBreakfast_logo1.jpeg"> 
        <span id= "Title">Bed Breakfast</span> 
	   
        
        <ul id="nav">
          <div class="ul">
            <li><a href="index.html">Home</a></li>
            <li><a href="room+rates.html">Rooms&Rates</a></li>
            <li><a href="scheduleView.html">Schedule</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="register.html">Register</a></li>
          </div>
        </ul>
      
  </header> 
 
  <div class="contactForm">
  
        <form action="">
  <!--  General -->
  <div class="form-group">
        <h2 class="heading">Booking & contact</h2>
        <div class="control">
          <input type="text" id="firstName" class="floatLabel" name="firstName">
          <label for="name">First Name</label>
        </div>
        <div class="control">
          <input type="text" id="lastName" class="floatLabel" name="lastName">
          <label for="name">Last Name</label>
        </div>
        <div class="control">
          <input type="text" id="email" class="floatLabel" name="email">
          <label for="email">Email</label>
        </div>       
        <div class="control">
          <input type="tel" id="phone" class="floatLabel" name="phone">
          <label for="phone">Phone</label>
        </div>
    </form>    
 
    
   
    
  <!--  Details -->
  <div class="form-group">
    <h2 class="heading">Details</h2>
    <div class="grid">
    <div class="col-1-4 col-1-4-sm">
      <div class="controls">
        <input type="date" id="arrive" class="floatLabel" name="arrive" value="<?php echo date('Y-m-d'); ?>">
        <label for="arrive" class="label-date"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Arrive</label>
      </div>      
    </div>
    <div class="col-1-4 col-1-4-sm">
      <div class="controls">
        <input type="date" id="depart" class="floatLabel" name="depart" value="<?php echo date('Y-m-d'); ?>" />
        <label for="depart" class="label-date"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Depart</label>
      </div>      
    </div>
      </div>
    
    <div class="people">
    <div class="col-1-3 col-1-3-sm">
      <div class="controls">
        <i class="fa fa-sort"></i>
        <select class="floatLabel" id="people" name="people">
          <option value="1">1</option>
          <option value="2" selected>2</option>
          <option value="3">3</option>
        </select>
        <label for="fruit"><i class="fa fa-male"></i>&nbsp;&nbsp;People</label>
      </div>      
    </div>
    </div>
    
    <div class="col-1-6 col-1-6-sm">
    <div class="controls">
      <i class="fa fa-sort"></i>
      <select class="floatLabel" id="room" name="room">
        <option value="blank"></option>
        <option value="deluxe" selected>With Bathroom</option>
        <option value="Zuri-zimmer">Without Bathroom</option>
      </select>
      <label for="fruit">Room</label>
     </div>     
    </div>

    <div class="col-1-5 col-1-5-sm">
    <div class="controls">
      <i class="fa fa-sort"></i>
      <select class="floatLabel" id="bedding" name="bedding">
        <option value="blank"></option>
        <option value="single-bed">Zweibett</option>
        <option value="double-bed" selected>Doppelbett</option>
      </select>
      <label for="fruit">Bedding</label>
     </div>     
    </div>
    
    
    </div>
    
            <button type="submit" name= "submit" value="submit" class="col-1-6">Submit</butoon>
      </div>  
    </form>
    
  </div><!-- /.form-group -->
<?php
    $newResSubmitted = sanitizeString(INPUT_GET, 'submit');

    
    if ($newResSubmitted=='submit'){
        
        $firstName = sanitizeString(INPUT_GET, 'firstName');
        $lastName = sanitizeString(INPUT_GET, 'lastName');
        $email = sanitizeEmail(INPUT_GET, 'email');
        $phoneNumber =  sanitizeString(INPUT_GET, 'phone');
        $arriveDate = date('Y-m-d', strtotime($_GET['arrive']));
        $departDate = date('Y-m-d', strtotime($_GET['depart']));
        $numPeople = sanitizeString(INPUT_GET, 'people');
        $room = sanitizeString(INPUT_GET, 'room');
        $bedding = sanitizeString(INPUT_GET, 'bedding');

        $numPeople = (int)$numPeople;
    
        if (!empty(trim($firstName))) {
            if (!empty(trim($lastName))) {
                if (!empty(trim($email))) {
                    if (!empty(trim($phoneNumber))) {
                        Try{
                            
                            //Find out if room is already booked for date
                            
                            $checkDate = $arriveDate;
                            $output = '';
                            
                            
                            while ($checkDate <= $departDate){
                               
                                
                               $query = "Select Count(reservationID)
                                     From roombookings
                                     WHERE room = '$room' and date = '$checkDate'";
                               
                               $errorMsg = "Error fetching dates";
                
                               $numDays = callQuery($pdo, $query, $errorMsg)->fetchColumn();
                               If ($numDays > 0){
                                   $outPut .= "<h1> Your date $checkDate and room selection has already been booked.</h1><br>";
                                   
                               } else   {
                                            // Insert Room Reservation in to the reservations table
                                     $pdo->beginTransaction();
                                     $sql = "INSERT INTO reservations (firstName, lastName, email, phone, room, bedding, numPeople, startDate, endDate) VALUES ('$firstName', '$lastName', '$email', '$phoneNumber','$room', '$bedding', $numPeople, '$arriveDate','$departDate')";
                                     $s =$pdo->prepare($sql);
                                     $s->execute(); 

                                     $reservationID =$pdo->lastInsertID();

                                     $pdo->commit();

                                     echo "<h1>Your Reservation Number is $reservationID </h1>";

                                     $resDate = $arriveDate;


                                     // enter in each day a room is booked into the room bookings table
                                     while ($resDate <= $departDate){
                                         $pdo->beginTransaction();
                                     $sql = "INSERT INTO roombookings (reservationID, room, date) VALUES ($reservationID, '$room', '$resDate')";
                                     $s =$pdo->prepare($sql);
                                     $s->execute(); 

                                     $pdo->commit();

                                     $resDate = date('Y-m-d',strtotime($resDate.' +1 day'));
                                     }
                               }
                            $checkDate = date('Y-m-d',strtotime($checkDate.' +1 day'));
                            }
                            
                            echo $outPut;
                                                
                            
                            
                           
                        } catch (PDOException $ex) {
                            $pdo->rollBack(); // Rollback to the commit
                            
                            $error = 'Error performing insert of informtion: ' . $ex->getMessage();
                            include 'error.html.php';
                            throw $ex;
                        } // end entering reservation
                    } Else {
                        echo"<h3> Please enter a Phone Number";
                    }// End Check for PhoneNumber
                } else {
                    echo"<h3> Please enter a Email";
                }// End Check for email
            } else {
                echo"<h3> Please enter a Last Name";
            }// End Check for last name
        } else {
           echo"<h3> Please enter a First Name";
        }//end chech for first Name
        
    } 
// end if to see if form submitted

    
?>


    
  <footer class="newfooter">
    <div id="footer-address">
      <p>
        915 Menomonie St.
        <br>
        Eau Claire, WI 54703
        <br>
        715-874-4877
        <br>
      </p>

    </div>
     <div id="follow-us">
      <h6> Follow Us </h6>
     <div id="facebook2">
        <a href= "https://www.facebook.com/eauclairefigureskate"  target="_blank"> <img src="images/facebook_icon.png"> </a>
     </div>
     <div id="instagram2">
        <a href= "https://www.instagram.com/ec.figureskaters/" target="_blank"> <img  src="images/instagram_icon.png"> </a>
     </div>
     </div>
     <div id="rights">
        <p>
          BedBreakfast <br>
          Copyright &copy; All Rights Reserved
        </p>
     </div>
  </footer>
         
  

  </body>
</html>