<?php

namespace App\Classes;


class AccessableQr
{
    public function Qr($request)
    {
        // Parameters
        $text = $request->text;
        $url = $request->url;
        $pdf = $request->pdf;
        $phone = $request->phone;
        $sms = $request->sms;
        $email = $request->email;
        $whatsapp = $request->whatsapp;
        $facetime = $request->facetime;
        $location = $request->location;
        $wifi = $request->wifi;
        $event = $request->event;
        $crypto = $request->crypto;
        $vcard = $request->vcard;
        $paypal = $request->paypal;
        $upi = $request->upi;

        // Generate array
        $access_types = array();

        // Check text
        if ($text == 'on') {
            $access_types['text'] = true;
        } else {
            $access_types['text'] = false;
        }

        // Check url
        if ($url == 'on') {
            $access_types['url'] = true;
        } else {
            $access_types['url'] = false;
        }

        // Check pdf
        if ($pdf == 'on') {
            $access_types['pdf'] = true;
        } else {
            $access_types['pdf'] = false;
        }

        // Check phone
        if ($phone == 'on') {
            $access_types['phone'] = true;
        } else {
            $access_types['phone'] = false;
        }

        // Check sms
        if ($sms == 'on') {
            $access_types['sms'] = true;
        } else {
            $access_types['sms'] = false;
        }

        // check email
        if ($email == 'on') {
            $access_types['email'] = true;
        } else {
            $access_types['email'] = false;
        }

        // Check whatsapp
        if ($whatsapp == 'on') {
            $access_types['whatsapp'] = true;
        } else {
            $access_types['whatsapp'] = false;
        }

        // Check facetime
        if ($facetime == 'on') {
            $access_types['facetime'] = true;
        } else {
            $access_types['facetime'] = false;
        }

        // Check location
        if ($location == 'on') {
            $access_types['location'] = true;
        } else {
            $access_types['location'] = false;
        }

        // Check wifi
        if ($wifi == 'on') {
            $access_types['wifi'] = true;
        } else {
            $access_types['wifi'] = false;
        }

        // Check event
        if ($event == 'on') {
            $access_types['event'] = true;
        } else {
            $access_types['event'] = false;
        }

        // Check crypto
        if ($crypto == 'on') {
            $access_types['crypto'] = true;
        } else {
            $access_types['crypto'] = false;
        }

        // Check vcard
        if ($vcard == 'on') {
            $access_types['vcard'] = true;
        } else {
            $access_types['vcard'] = false;
        }

        // Check paypal
        if ($paypal == 'on') {
            $access_types['paypal'] = true;
        } else {
            $access_types['paypal'] = false;
        }

        // Check upi
        if ($upi == 'on') {
            $access_types['upi'] = true;
        } else {
            $access_types['upi'] = false;
        }

        $this->access_types = $access_types;

        return $this->access_types;
    }
}
