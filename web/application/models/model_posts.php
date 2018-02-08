<?
class Model_Posts extends Model{

    public function posts($per_page,$path){

        $total_items = $this->db->makeQuery('SELECT COUNT(*) from `posts`');

        $total_items = (int)$total_items[0]['COUNT(*)'];

        $query =
            "SELECT posts.*, count(comments.id) as comments
            FROM posts 
            LEFT OUTER JOIN comments ON posts.id = comments.post_id
            GROUP BY posts.id DESC";

        $data = Paginator::paginate($this->db,$query,$per_page,$total_items,$path);

        $query = 'SELECT posts.*, count(comments.id) as comments
                    FROM posts 
                    LEFT OUTER JOIN comments ON posts.id = comments.post_id
                    GROUP BY posts.id
                    ORDER BY comments DESC
                    LIMIT 5';

        $data['popular_posts'] = $this->db->makeQuery($query);

        return $data;

    }

    public function single_post($per_page,$path,$id){

        $id = (int)$id;

        $total_items = $this->db->makeQuery('SELECT COUNT(*) from `comments` WHERE `post_id`='.$id);

        $total_items = (int)$total_items[0]['COUNT(*)'];

        $query = 'SELECT 
                            comments.id as comment_id,
                            comments.name as comment_name,
                            comments.content as comment_content,
                            comments.created_at as comment_created_at,
                            posts.id as post_id,
                            posts.name as post_name,
                            posts.content as post_content,
                            posts.created_at as post_created_at
                            FROM comments
                            RIGHT JOIN posts ON posts.id = comments.post_id 
                            WHERE posts.id ='.$id.'
                            GROUP BY comment_id DESC';

        $data = Paginator::paginate($this->db,$query,$per_page,$total_items,$path);

        $data['total_comments'] = $total_items;

        return $data;

    }
    public function create_post(){
        $name = Lib::clearRequest($_POST['name']);
        $content = Lib::clearRequest($_POST['content']);

        if(!preg_match("/^[\p{L}]+$/u",$name)){
            $_SESSION['errors'] = 'Не коректно введено имя';
            header("location: /posts");
            die();
        }

        if (!hash_equals($_SESSION['token'], $_POST['token'])) {
            $_SESSION['errors'] = 'Токет не совпадает';
            header("location: /posts");
            die();
        }


        $query = 'INSERT INTO `posts`(`name`, `content`, `created_at`)
                  VALUES ("'.$name.'","'.$content.'",CURRENT_TIMESTAMP())';

        $this->db->makeQuery($query);

        header("location: /posts");
    }
}
