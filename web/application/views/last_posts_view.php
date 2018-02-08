<div id="main">
    <h1>Популярные записи</h1>
    <div id="block-for-slider">
        <div id="viewport">
            <ul id="slidewrapper">
                <?foreach($data['popular_posts'] as $post){?>
                <li class="slide">
                    <div class="post_author">
                        <h1><?echo $post['name']?></h1>
                        <span class="date_time"><?echo $post['created_at']?></span>
                        <p>
                            <?echo strlen($post['content'])>300 ? mb_substr($post['content'], 0, 300) : $post['content'];?>
                        </p>
                        <div>
                            <a href="/posts/single/<?echo $post['id']?>">
                                Читать далее...
                            </a>
                            <span class="post_comments" >
                            <span class="glyphicon glyphicon-comment"></span>
                                <?echo $post['comments']?>
                       </span>
                        </div>
                    </div>
                </li>
                <?}?>
            </ul>
        </div>

        <ul id="nav-btns">
            <?for($i=0;$i<count($data['popular_posts']);$i++){?>
                <li class="slide-nav-btn"></li>
            <?}?>
        </ul>
    </div>
    <div id="post">
        <h1>Все записи</h1>
        <ul class="posts_list">
            <?foreach($data['items'] as $post){?>
            <li class="main_post">
               <div class="post_author">
                   <h1><?echo $post['name']?></h1>
                    <span class="date_time"><?echo $post['created_at']?></span>
                   <p>
                       <?echo strlen($post['content'])>300 ? mb_substr($post['content'], 0, 300) : $post['content'];?>
                   </p>
                   <div>
                       <a href="/posts/single/<?echo $post['id']?>">
                           Читать далее...
                       </a>
                       <span class="post_comments" >
                            <span class="glyphicon glyphicon-comment"></span>
                            <?echo $post['comments']?>
                       </span>
                   </div>
               </div>
            </li>
            <?}?>
        </ul>
        <div id="pagination">
            <?include './web/application/views/pagination.php'?>
        </div>
    </div>
    <div id="post_form">
        <h1> Создать запись </h1>
        <?  if($_SESSION['errors']){?>
            <div id='alert'>
                <div class=' alert alert-block alert-info fade in center'>
                    <?echo $_SESSION['errors']?>
                </div>
            </div>
            <?
            unset($_SESSION['errors']);
        }?>
        <form id="create_post" method="POST" action="/posts/create">
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
<script src="/web/static/js/my_slider.js"></script>