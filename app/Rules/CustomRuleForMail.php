<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class CustomRuleForMail implements Rule
{
    protected $client;
    /**
     * 
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        try {
            $response = $this->client->get('https://mailcheck.p.rapidapi.com/', [
                'headers' => [
                    'X-Rapidapi-Key' => '416e47df51msh707403f42914e6cp1f6e37jsn7bebf98238be',
                    'X-Rapidapi-Host' => 'mailcheck.p.rapidapi.com',
                ],
                'query' => [
                    'domain' => $value,
                ]
            ]);
            $body = json_decode($response->getBody(), true);
            Log::info('MailAPI Response:', $body);
            if(($body['valid']) && ($body['text']== "Disposable / temporary domain" || $body['text']== "Looks okay")){
                return true;
            }else{
                return false;
            }
        } catch (\Exception $e) {
            Log::error('MailAPI Request Failed: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Le mail soumis n\'est pas valide';
    }
}
