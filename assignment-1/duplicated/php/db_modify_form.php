<?php
  $book_title = $_POST['book_title'];
  $bookId = $_POST['bookId'];
?>

<!-- Render HTML page -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="author" content="Cuong Quoc Dao">
  <meta name="student ID" content="19789590">
  <meta name="description" content="assignment 1">
  <link type="text/css" rel="stylesheet" href="../css/style.css"></link>
  <script type="text/javascript" src="../js/generaljs.js"></script>
  <title>Online books station | Database modify form</title>
</head>
<body>
  <!-- header -->
  <header>
    <div class="container">
      <div id="brand">
        <h1><span class="highlight">Online</span> Books station</h1>
        <p>The 1<sup>st</sup> online books station <span class="highlight">for ICT industry</span></p>
      </div>
      <nav>
        <ul>
          <li><a href="../html/homepage.html">Home</a></li>
          <li><a href="../html/store.html">Store locations</a></li>
          <li><a href="../html/building.html">Contact</a></li>
          <li><a href="../html/building.html">Account</a></li>
          <li id="dropdown_menu">About
            <div id="dropdown_content">
              <a href="../html/author.html">About the author</a>
              <a href="../html/history.html">History of the store</a>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- end header -->

  <!-- begin main body -->
  <section id="db_modify_form" class="data_illustrate">
    <div class="container">
      <form action="db_modify.php" method="POST">
        <table class="table">
          <caption>
            <h1>Click to the table cell to modify data of
              <span class="highlight"><?php echo $book_title?></span>
            </h1>
          </caption>
          <tr>
            <th><?php echo $bookId ?></th>
            <th><?php echo $book_title ?></th>
          </tr>
          <tr>
            <td><input name="newBookId" type="text"></td>
            <td><input name="newBookTitle" type="text"></td>
          </tr>
        </table>
        <input type="hidden" name="bookId" value="<?php echo $bookId ?>">
        <input type="hidden" name="book_title" value="<?php echo $book_title ?>">
        <button type="submit">Submit</button>
        <button type="button" onclick="getHTML('selection')">Back to information selection page</button>
      </form>
    </div>
  </section>
  
  <footer>
    <h4>Assignment 1 - 19789590 - Cuong Quoc Dao</h4>
  </footer>
</body>
</html>
