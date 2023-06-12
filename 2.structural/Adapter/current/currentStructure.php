<?php

namespace old;
class NotificationManager
{
    public function sendNotification($data, $type = null)
    {
        switch($type){
            case "email":
                $notification = new \EmailService();
                $notification->setTo($data['to']);
                $notification->setFrom($data['from']);
                $notification->setTitle($data['title']);
                $notification->setMessage($data['message']);
                $notification->sendEmail();
                break;
            case "sms":
                $notification = new \SmsService();
                $notification->setNumber($data['number']);
                $notification->setMessage($data['message']);
                $notification->sendSms();
                break;

        }
    }
}