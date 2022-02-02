<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>今、uploadされてるファイル</p>
@foreach($items as $item)
    <p>{{$item->voicedata}}</p>
@endforeach
<p>音声データは20秒以上でお願いします。</p>
    <form action="/upload" enctype="multipart/form-data" method="post">
       @csrf　　  　　 　
         <input type="file" name="voicedata">
         <input type="submit" value="アップロードする">
    </form>
</body>
</html>
