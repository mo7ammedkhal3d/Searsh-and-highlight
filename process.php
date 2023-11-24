<?php
$jsonData = file_get_contents('assets\data\posts.json');

$posts = json_decode($jsonData, true);


$inputText = $_GET['inputText']?? "";  

if($inputText!=""){
  function highlightText($text, $searchTerm) {
      return str_replace($searchTerm, '<span class="highlight">' . $searchTerm . '</span>', $text);
  }

  $matchingPosts = array_filter($posts, function ($post) use ($inputText){
      return strpos($post['title'], $inputText) !== false || strpos($post['content'], $inputText) !== false;
  });

  $result="";

  foreach ($matchingPosts as $post) {
     $result .='<div class="post">
     <div class="title">
       <h3>' . highlightText($post['title'], $inputText) . '</h3>
     </div>
     <div class="content">
      <p>' . highlightText($post['content'], $inputText) . '</p>
     </div>
     </div>';
  }

  echo $result;
}
?>