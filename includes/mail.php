<?php

use Mailgun\Mailgun;

function send_email($subject, $content) {
    # First, instantiate the SDK with your API credentials
    $mg = Mailgun::create(getenv('MAILGUN_API_KEY'));

    # Now, compose and send your message.
    # $mg->messages()->send($domain, $params);
    return $mg->messages()->send(getenv('MAILGUN_DOMAIN'), [
      'from'    => getenv('MAIL_FROM'),
      'to'      => getenv('MAIL_TO'),
      'subject' => $subject,
      'text'    => $content
    ]);
}