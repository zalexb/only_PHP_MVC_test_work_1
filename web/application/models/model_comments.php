<?
class Model_Comments extends Model{
    public function create_comment($id){
        $name = Lib::clearRequest($_POST['name']);
        $content = Lib::clearRequest($_POST['content']);

        if(!preg_match("/^[\p{L}]+$/u",$name)){
            $_SESSION['errors'] = 'Не коректно введено имя';
            header("location: /posts/single/".$id);
            die();
        }

        if (!hash_equals($_SESSION['token'], $_POST['token'])) {
            $_SESSION['errors'] = 'Токет не совпадает';
            header("location: /posts/single/".$id);
            die();
        }


        $query = 'INSERT INTO `comments`(`name`, `content`, `post_id`,`created_at`)
                  VALUES ("'.$name.'","'.$content.'",'.$id.',CURRENT_TIMESTAMP())';

        $this->db->makeQuery($query);

        header("location: /posts/single/".$id);
    }
}