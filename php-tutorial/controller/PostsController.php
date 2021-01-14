<?php
class PostsController {
    public function __construct()
    {
        echo "<p>abc</p>";
    }

    public function savePosts($title, $description) {
        $posts = new Posts();
        $posts->title = $title;
        $posts->description = $description;
        //    $posts->image = $image;
        //    $posts->status = $status;
        echo "<p>Title: ", $posts->title, "</p>";
        echo "<p>Description: ", $posts->description, "</p>";
    }
}
