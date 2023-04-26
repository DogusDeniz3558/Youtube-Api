<!doctype html>
<html lang="en">

<head>
    <title>Youtube APİ</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>


    <?php

    function youtubeVideolar()
    {
        $token = "youtube data apisi token bilgisi";
        $url = "https://youtube.googleapis.com/youtube/v3/playlistItems?part=snippet%2CcontentDetails%2Cstatus%2Cid&playlistId=UUYuAeZVtSTlA7bbMdODBEaw&key=$token";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $request = curl_exec($curl);
        curl_close($curl);
        $request = json_decode($request, true);
        return $request;
    }

    $videolar = youtubeVideolar();


    foreach ($videolar['items'] as $value) { ?>
        <div class="card mt-3 ms-5" style="width:30rem; height:30rem;">
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?= $value['snippet']['resourceId']['videoId']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <div class="card-body">
                <h5 class="card-title"><?= $value['snippet']['title']; ?></h5>
                <p class="card-text"><?= mb_substr($value['snippet']['description'],0,72,'UTF-8') ?>;</p>
                <a href="https://www.youtube.com/watch?v=<?= $value['snippet']['resourceId']['videoId']; ?>" target="_blank" class="btn btn-primary">Videoya Git</a>
            </div>
        </div>
    <?php } ?>





    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>