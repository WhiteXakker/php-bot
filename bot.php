<?php
// Telegram bot token
$token = "8106160492:AAGd1Ij-H5X6TvRjZI_iwOrFG59DeKLYAOk"; // bu yerga tokenni yozing

// Telegram API URL
$apiURL = "https://api.telegram.org/bot$token/";

// Foydalanuvchidan kelgan so‘rovni o‘qish
$update = json_decode(file_get_contents("php://input"), true);

// Agar text bor bo‘lsa
if (isset($update["message"]["text"])) {
    $chat_id = $update["message"]["chat"]["id"];
    $text = $update["message"]["text"];

    // Javobni tayyorlash
    $reply = "Siz yubordingiz: " . $text;

    // Javob yuborish
    file_get_contents($apiURL . "sendMessage?chat_id=" . $chat_id . "&text=" . urlencode($reply));
}
?>
