<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "manuelymotita@gmail.com";
 
    $email_subject = "Your email subject line";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['telephone']) ||
 
        !isset($_POST['comments'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $first_name = $_POST['first_name']; // required
 
    $last_name = $_POST['last_name']; // required
 
    $email_from = $_POST['email']; // required
 
    $telephone = $_POST['telephone']; // not required
 
    $comments = $_POST['comments']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
<!DOCTYPE html>
<html>
  <head>
    <title>LACOA, Inc.</title>
    <meta name="description" content="Lacoa, Inc. We laminate and emboss materials suitable for the belt, binding, wall covering, loose-leaf, garment, display, applications and specialty items industries.">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="animate.css">
  </head>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <script>
     new WOW().init();
  </script>
  <body>
    <div id="header">
      <div id="nav">
          <div id="logo">
            <img src="images/logo.png" width="100px" alt="logo" />
          </div> <!-- ENd of #logo -->
          <div id="blues">
            <a id="large" href="index.html">Home</a>
            <a id="large" href="product.html">Product Cards</a>
            <a id="large" href="contact.html">Contact Us</a>
          </div>
      </div> <!--END of #nav-->
    </div><!--END of #header -->
    <div id="content">
      <form name="contactform" method="post" action="send_form_email.php">
        <table width="450px">
          <tr>
            <td valign="top">
              <label for="first_name">First Name *</label>
            </td>
            <td valign="top">
                <input  type="text" name="first_name" maxlength="50" size="30">
            </td>
          </tr>
          <tr>
            <td valign="top">
                <label for="last_name">Last Name *</label>
            </td>
            <td valign="top">
              <input  type="text" name="last_name" maxlength="50" size="30">
            </td>
          </tr>
          <tr>
            <td valign="top">
                <label for="email">Email Address *</label>
            </td>
            <td valign="top">
                <input  type="text" name="email" maxlength="80" size="30">
            </td>
          </tr>
          <tr>
            <td valign="top">
                <label for="telephone">Telephone Number</label>
            </td>
            <td valign="top">
                <input  type="text" name="telephone" maxlength="30" size="30">
            </td>
          </tr>
          <tr>
            <td valign="top">
                <label for="order">Order *</label>
            </td>
            <td valign="top">
                <textarea  name="Order" maxlength="2000" cols="25" rows="6"></textarea>
            </td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:center">
                <input type="submit" value="Submit">   <a href="http://www.freecontactform.com/email_form.php">Email Form</a>
            </td>
          </tr>
        </table>
      </form>
    </div> <!--END of #content-->
    <br id="clear"/>
    <div id="footer">
        <div id="nameFooter" class="name_footer">
        <p class="compFooter white">LACOA INC.</p>
        <p class="des white">Laminating corporation of America</p>
        <p class="des white">34 Waite st, Patterson NJ 07524</p>
      </div> <!-- END of #name -->
      <div id="socialFooter" class="solcialFooter">
        <img class="socialSize" src="images/facebook_white.png" alt="fallow us on facebook" />
        <img class="socialSize" src="images/instagram_white.png" alt="fallow us on instagram" />
        <img class="socialSize" src="images/twitter_white.png" alt="fallow us on twitter" />
      </div><!--END of #social -->
      <br id="clear"/>
    </div> <!--End of #footer-->
  </body>
</html>
 
 
 
Thank you for contacting us. We will be in touch with you very soon.
 
 
 
<?php
 
}
 
?>