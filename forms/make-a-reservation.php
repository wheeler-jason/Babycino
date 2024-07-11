<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $make_a_reservation = new PHP_Email_Form;
  $make_a_reservation->ajax = true;
  
  $make_a_reservation->to = $receiving_email_address;
  $make_a_reservation->from_name = $_POST['name'];
  $make_a_reservation->from_email = $_POST['email'];
  $make_a_reservation->subject = "New table booking request from the website";

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $make_a_reservation->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $make_a_reservation->add_message( $_POST['name'], 'Name');
  $make_a_reservation->add_message( $_POST['email'], 'Email');
  $make_a_reservation->add_message( $_POST['phone'], 'Phone', 4);
  $make_a_reservation->add_message( $_POST['date'], 'Date', 4);
  $make_a_reservation->add_message( $_POST['time'], 'Time', 4);
  $make_a_reservation->add_message( $_POST['people'], '# of people', 1);
  $make_a_reservation->add_message( $_POST['message'], 'Message');

  echo $make_a_reservation->send();
?>
