<?php 
# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = Mailgun::create('01b87237eaf2426708e37e7c9ccf69d3-69210cfc-19f6fc5a');
$domain = "eu-jer.com";

# Make the call to the client.
$result = $mgClient->messages()->send("$domain",
	array('from'    => 'EU-JER <postmaster@eu-jer.com>',
		  'to'      => 'Ümit Tunç <umit.tunc@truncgil.com>',
		  'subject' => 'Hello Ümit Tunç',
		  'text'    => 'Congratulations Ümit Tunç, you just sent an email with Mailgun!  You are truly awesome! '));
var_dump($result);
// You can see a record of this email in your logs: https://app.mailgun.com/app/logs.

// You can send up to 300 emails/day from this sandbox server.
// Next, you should add your own domain so you can send 10000 emails/month for free.
?>