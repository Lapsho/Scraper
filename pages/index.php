<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style/skin.css">
    <link rel="stylesheet" href="style/bootstrap/css/bootstrap.css">
    <script src="style/JS/Sort.js"></script>
    <title><?php echo App::PAGE_TITLE ?></title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body class="body ">
<div class="container">
    <h1 class="red-title"><?php echo App::PAGE_TITLE ?></h1>
    <form action="/" method="get">
        <div class="form-group">
            <label for="exampleInputEmail1">INSTAGRAM SOURCES</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="@username or URL"
                   name="request">
            <small id="emailHelp" class="form-text">Some bullshit.</small>
        </div>
        <button type="submit" class="btn red-bottom">Go</button>
<!--        <button type="button" class="btn red-bottom" formmethod="get" value="images"-->
<!--                onclick="location.href='/'">-->
<!--            Sort images-->
<!--        </button>-->
    </form>
</div>
<div class="container">
    <?php if ($_GET['request']): ?>
        <?php $handle = new HandleRequest() ?>
        <?php $result = $handle->handle($_GET['request']) ?>
        <?php if (is_array($result)): ?>
            <div class="card-columns">
                <?php foreach ($result as $image): ?>
                    <div class="card">
                        <a href="<?php echo $image['urlImage'] ?>">
                            <img class="card-img-top" src="<?php echo $image['urlThumbnail'] ?>" alt="Card image cap">
                        </a>
                        <h5 class="card-title"><?php echo date("Y-m-d H:i:s", $image['date']) ?></h5>
                    </div>
                <?php endforeach ?>
            </div>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $result ?>
            </div>
        <?php endif ?>
    <?php else: ?>
        <div class="alert alert-dark" role="alert">
            enter the user's nickname (@username or username) or link in the instagram.
        </div>
    <?php endif ?>
</div>
</body>
</html>