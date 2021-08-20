<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class newsletter
{

    public function subscribe(string $email, string $list = null)
    {
        $list = !is_null($list) ? $list : config('services.mailchimp.lists.subscribers');

        return $this->client()->lists->addListMember($list, [
            'email_address' => request('email'),
            'status' => 'subscribed'
        ]);
    }

    protected function client()
    {
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.server_prefix')
        ]);
    }
}
