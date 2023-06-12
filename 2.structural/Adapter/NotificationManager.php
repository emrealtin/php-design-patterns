<?php

class NotificationManager
{
    public function sendNotification($data, $type = null)
    {
        switch($type){
            case "email":
                $notification = new EmailAdapter();
                break;
            case "sms":
                $notification = new SmsAdapter();
                break;
            case "mobile":
                $notification = new MobilePushAdapter();
                break;
            default:
                die("Unknown type");
        }

        $notification->setData($data);
        $notification->sendNotification();
    }
}