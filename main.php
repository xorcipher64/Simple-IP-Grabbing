<?php


class Personal
{
    private static $data = [
        'IP' => null,
        'country' => null,
        'region' => null,
        'zip' => null, 
        'city' => null, 
        'timezone' => null,
        'isp' => null
    ];

    public static function getDetails($url) 
    {
        $response = file_get_contents($url);
        $responseData = json_decode($response, true);
        // Store response data in array
        self::$data['IP'] = $responseData['query'] ?? null;
        self::$data['country'] = $responseData['country'] ?? null;
        self::$data['region'] = $responseData['region'] ?? null;
        self::$data['zip'] = $responseData['zip'] ?? null;
        self::$data['city'] = $responseData['city'] ?? null;
        self::$data['timezone'] = $responseData['timezone'] ?? null;
        self::$data['isp'] = $responseData['isp'] ?? null;

        return self::$data;
         
    }

    // Itterate over array and output 
    public static function returnData() 
    {
        foreach(self::$data as $info) 
        {
            echo "[ ⭐ ] => " . $info . "\n";
        }
    }

    // carraige return to zero out the console for cmd || bash 
    public static function zeroConsole() 
    {
        for($i = 0; $i < 50; $i++) 
        {
            echo "\r\n";
        }
    }

}

// URL to get json response data
$url = "http://ip-api.com/json/";

Personal::zeroConsole();
// Get user details from ip-api
$data = Personal::getDetails($url);

echo "Getting Your Personal Information\n\n";
// Output users information
Personal::returnData();

// Or output individual selections
echo "IP-ONLY: " . $data['IP'];