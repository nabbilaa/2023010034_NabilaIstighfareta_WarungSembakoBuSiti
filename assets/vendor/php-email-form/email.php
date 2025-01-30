<?php
class PHP_Email_Form {
    public $to;
    public $from_name;
    public $from_email;
    public $subject;
    public $ajax;
    public $messages = array();

    public function add_message($content, $label, $priority = 0) {
        $this->messages[] = array(
            'content' => $content,
            'label' => $label,
            'priority' => $priority
        );
    }

    public function send() {
        $email_content = "";
        foreach ($this->messages as $message) {
            $email_content .= $message['label'] . ": " . $message['content'] . "\n";
        }

        $headers = "From: " . $this->from_name . " <" . $this->from_email . ">";
        return mail($this->to, $this->subject, $email_content, $headers);
    }
}
?>
