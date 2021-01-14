<?php
class PostsRepository {
    public function createPosts() {
        $conn = ConnectUtil::connectMysqli();

        // drop if exists table
        $sqlDrop = "DROP TABLE IF EXISTS posts";
        $conn->query($sqlDrop);

        // create table
        $sqlCreate = "
            CREATE TABLE posts (
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                title VARCHAR(200),
                description TEXT,
                image VARCHAR(200),
                status int(1),
                create_at DATETIME,
                update_at DATETIME
            )
        ";

        $conn->query($sqlCreate);
        $conn->close();
    }

    public function insertPosts(Posts $posts) {
        $conn = ConnectUtil::connectMysqli();
        // insert data table

        $sqlInsert = "
            INSERT INTO posts(title, description, image, status, create_at, update_at)
            VALUES (?, ?, ?, ?, ?, ?)
        ";
        $query = $conn->prepare($sqlInsert);
        $query->bind_param('sssiss',$posts->title,$posts->description, $posts->image, $posts->status, $posts->createAt, $posts->updateAt);

        $query->execute();
        $query->close();
    }
}
