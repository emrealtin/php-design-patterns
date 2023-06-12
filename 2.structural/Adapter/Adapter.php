<?php

interface NotificationInterface
{
    public function setData($data);
    public function sendNotification();
}


class SmsAdapter implements NotificationInterface
{
    protected $data;

    public function setData($data)
    {
        $this->data = $data;
    }

    public function sendNotification()
    {
        $notification = new SmsService();
        $notification->setNumber($this->data['number']);
        $notification->setMessage($this->data['message']);
        $notification->sendSms();
    }
}

class EmailAdapter implements NotificationInterface
{
    protected $data;

    public function setData($data)
    {
        $this->data = $data;
    }

    public function sendNotification()
    {
        $notification = new EmailService();
        $notification->setTo($this->data['to']);
        $notification->setFrom($this->data['from']);
        $notification->setTitle($this->data['title']);
        $notification->setMessage($this->data['message']);
        $notification->sendEmail();
    }
}
class MobilePushAdapter implements NotificationInterface
{
    protected $data;

    public function setData($data)
    {
        $this->data = $data;
    }
    public function sendNotification()
    {
        $notification = new MobileService();
        $notification->setRegId($this->data['reg_id']);
        $notification->setMessage($this->data['message']);
        $notification->push();
    }
}