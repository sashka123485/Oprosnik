<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "diddaf5352@gmail.com";
    $subject = "Результаты опросника: 100 вопросов";

    $message = "Получены ответы на опросник:\n\n";

    // Собираем все ответы
    for ($i = 1; $i <= 100; $i++) {
        if (isset($_POST["q$i"])) {
            $message .= "$i. " . htmlspecialchars($_POST["q$i"]) . "\n";
        } else {
            $message .= "$i. Не указано\n";
        }
    }

    $headers = "From: noreply@yourdomain.com\r\n";
    $headers .= "Reply-To: noreply@yourdomain.com\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "<h2>Спасибо! Ваши ответы отправлены.</h2>";
    } else {
        echo "<h2>Ошибка при отправке. Попробуйте ещё раз.</h2>";
    }
} else {
    echo "<h2>Неверный метод запроса.</h2>";
}
?>
