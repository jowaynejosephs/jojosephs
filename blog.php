$curl = curl_init();
$username = "saymontavares";
$url = "https://dev.to/api/articles?username={$username}";

curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "cache-control: no-cache"
    ]
]);

$res = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$res = json_decode($res, true);

foreach ($res as $article) {
    echo    "<a href='{$article['url']}' class='article'>
                <h2>{$article['title']}</h2>
                <div class='description'>{$article['description']}</div>
                <div class='readmore'>Read More</div>
            </a>";
}
