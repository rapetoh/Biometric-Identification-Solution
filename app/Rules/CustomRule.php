<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;


class CustomRule implements Rule
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
            $response = $this->client->request('GET', 'https://phonenumbervalidatefree.p.rapidapi.com/ts_PhoneNumberValidateTest.jsp', [
                'query' => [
                    'number' => $value,
                    'country' => 'TG'
                ],
                'headers' => [
                    'x-rapidapi-host' => 'phonenumbervalidatefree.p.rapidapi.com',
                    'x-rapidapi-key' => '416e47df51msh707403f42914e6cp1f6e37jsn7bebf98238be'
                ]
            ]);
            
            $body = json_decode($response->getBody(), true);
            Log::info('API Response:', $body);
            return $body['isValidNumber'];
        } catch (\Exception $e) {
            Log::error('API Request Failed: ' . $e->getMessage());
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
        return 'Le numéro soumis n\'est pas valide';
    }
}
