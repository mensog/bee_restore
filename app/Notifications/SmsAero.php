<?php

namespace App\Notifications;

class SmsAero
{
    const URL_SMSAERO_API = 'https://gate.smsaero.ru/v2';
    /**
     * Формирование curl запроса
     * @param $url
     * @param $post
     * @param $options
     * @return mixed
     */
    private function curl_post($url, array $post = NULL, array $options = array())
    {
        $defaults = array(
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_URL => $url,
            CURLOPT_FRESH_CONNECT => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FORBID_REUSE => 1,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => http_build_query($post),
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_USERPWD => env('SMS_AERO_EMAIL') . ":" . env('SMS_AERO_API_KEY'),
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
        );

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
        if (!$result = curl_exec($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }

    /**
     * Отправка сообщения
     * @param $number string|array  - Номер телефона(ов)
     * @param $text string          - Текст сообщения
     * @param $channel string       - Канал отправки
     * @param $dateSend integer     - Дата для отложенной отправки сообщения (в формате unixtime)
     * @param $callbackUrl string   - url для отправки статуса сообщения в формате http://your.site или
     * https://your.site (в ответ система ждет статус 200)
     * @return array
     */
    public function send($number, $text, $channel, $dateSend = null, $callbackUrl = null)
    {
        return json_decode(self::curl_post(self::URL_SMSAERO_API . '/sms/send/', [
            'number' => $number,
            'sign' => env('SMS_AERO_SIGN', 'Beeclub'),
            'text' => $text,
            'channel' => $channel,
            'dateSend' => $dateSend,
            'callbackUrl' => $callbackUrl
        ]), true);
    }
}
