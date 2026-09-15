<?php
require_once __DIR__ . '/../backend/env_loader.php';

function askAI($message){

    $apiKey = getenv('OPENAI_API_KEY');
    if (!$apiKey) {
        return "Error: OpenAI API key is not configured. Please define OPENAI_API_KEY in your .env file.";
    }

    $data = [
        "model" => "gpt-4o-mini",
        "messages" => [
            ["role" => "user", "content" => $message]
        ]
    ];

    $ch = curl_init("https://api.openai.com/v1/chat/completions");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Bearer $apiKey"
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        return "cURL Error: " . $error_msg;
    }
    curl_close($ch);

    $result = json_decode($response, true);

    if (isset($result['error'])) {
        return "OpenAI Error: " . ($result['error']['message'] ?? 'Unknown error');
    }

    return $result['choices'][0]['message']['content'] ?? "No response received from AI.";
}
?>