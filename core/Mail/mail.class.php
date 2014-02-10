<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * Mailingclass
 **/
class Mail {
    protected $_mail;
    function __construct() {
        require (ROOT."/core/Library/phpmailer/PHPMailerAutoload.php");
        $this->setConfigs();
    }

    /**
     * Config the Mailer
     *
     * @return PHPMailer
     */
    protected function setConfigs() {
        $this->_mail = new PHPMailer();
        $this->_mail->Host = MAIL_HOST;
        $this->_mail->SMTPAuth = true;
        $this->_mail->Username = MAIL_USER;
        $this->_mail->Password = MAIL_PW;
        $this->_mail->From     = MAIL_ADRESS;
        $this->_mail->FromName = MAIl_NAME;
        $this->_mail->isHTML(true);
        //Testing
        $this->_mail->addAddress('flaverkleiber@yahoo.de');
        $this->_mail->Subject = 'Testmail';
        return $this->_mail;
    }

    /**
     * Send a Email
     *
     * @param string $template
     * @throws Exception
     * @return void
     */
    public function sendEmail($template = "") {
        if(file_exists(ROOT.'/language/de/mail/'.$template.'.phtml')) {
            $text = file_get_contents(ROOT.'/language/de/mail/'.$template.'.phtml');
            $this->_mail->Body = $text;
        } else {
            throw new Exception("$template can not be load");
        }
        if(!$this->_mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $this->_mail->ErrorInfo;
            exit;
        }

        echo 'Message has been sent';
    }
}