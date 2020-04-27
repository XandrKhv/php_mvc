<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?=$data['description']?>" />
		<title><?= $data['title']?></title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <script src="/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/js/script.js" type="text/javascript"></script>
	</head>
	<body>
        <div class="container">
            <?= $content ?>
        </div>
	</body>
</html>