<div id="main">
    <div id="post">
        <div class="post_author">
            <h1><?echo $data['items'][0]['post_name']?></h1>
            <span class="date_time"><?echo $data['items'][0]['post_created_at']?></span>
            <p>
                <?echo $data['items'][0]['post_content']?>
            </p>
        </div>
    </div>
    <div id="post_comments">
        <h1>Комментарии(<?echo $data['total_comments']?>)</h1>
        <ul>
            <?foreach ($data['items'] as $comment){?>
            <li>
                <div class="post_author">
                    <h1><?echo $comment['comment_name']?></h1>
                    <span class="date_time"><?echo $comment['comment_created_at']?></span>
                    <p>
                        <? echo $comment['comment_content']?>
                    </p>
                </div>
            </li>
            <?}?>
        </ul>
    </div>
    <div id="pagination">
        <?include './web/application/views/pagination.php'?>
    </div>
    <div id="post_form">
        <h1> Оставить комментарий </h1>
        <?  if($_SESSION['errors']){?>
            <div id='alert'>
                <div class=' alert alert-block alert-info fade in center'>
                    <?echo $_SESSION['errors']?>
                </div>
            </div>
        <?
            unset($_SESSION['errors']);
        }?>
        <form  id="create_post" method="POST" action="/comments/create/<?echo $data['items'][0]['post_id']?>">
            <div class="form-group">
                <label for="name">Имя:</label>
                <input name="name" style="width: 200px" type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="pwd">Текст:</label>
                <textarea name="content" style="height: 200px;width:800px;" class="form-control" id="pwd"></textarea>
            </div>
            <input type="hidden" name="token" value="<?php
            echo $_SESSION['token'];
            ?>" />
            <button type="submit" class="btn btn-default">Создать</button>
        </form>
    </div>
</div>