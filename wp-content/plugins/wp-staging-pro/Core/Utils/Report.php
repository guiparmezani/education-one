<?php

namespace WPStaging\Core\Utils;

use WPStaging\Backend\Modules\SystemInfo;

class Report
{

    /**
     * Send customer issue report
     *
     * @param string $email User e-mail
     * @param string $message User message
     * @param integer $terms User accept terms
     *
     * @return array
     */
    public function send($email, $message, $terms, $syslog, $provider = null)
    {
        $errors      = [];
        $attachments = [];
        $maxFileSize = 512 * 1024;
        $message     .= "\n\n'Hosting provider: " . $provider;

        if ( ! empty($syslog)) {
            $message .= "\n\n'" . $this->getSyslog();

            $debugLogFile = WP_CONTENT_DIR . '/debug.log';
            if (filesize($debugLogFile) && $maxFileSize > filesize($debugLogFile)) {
                $attachments[] = $debugLogFile;
            }
        }

        if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = __('Email address is not valid.', 'wp-staging');
        } elseif (empty($message)) {
            $errors[] = __('Please enter your issue.', 'wp-staging');
        } elseif (empty($terms)) {
            $errors[] = __('Please accept our privacy policy.', 'wp-staging');
        } else {

            if ($this->sendMail($email, $message, $attachments) === false) {
                $errors[] = 'Can not send report. <br>Please send us a mail to<br>support@wp-staging.com';
            }
        }

        return $errors;
    }

    private function getSyslog()
    {

        $syslog = new SystemInfo();

        return $syslog->get();
    }

    /**
     * send feedback via email
     *
     * @return boolean
     */
    private function sendMail($from, $text, $attachments)
    {

        $headers = [];

        $headers[] = "From: $from";
        $headers[] = "Reply-To: $from";

        $subject = 'Report Issue!';

        $success = wp_mail('support@wp-staging.com', $subject, $text, $headers, $attachments);

        if ($success) {
            return true;
        } else {
            return false;
        }
        die();
    }

}
