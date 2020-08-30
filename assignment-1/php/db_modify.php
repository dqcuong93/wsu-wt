<?php
  $dbc= mysqli_connect ('localhost', 'root', '', 'wt19789590')
  OR die (mysqli_connect_error());

  mysqli_set_charset($dbc, 'utf8');

  $bookId = $_POST['bookId'];
  $book_title = $_POST['book_title'];
  $newBookId = $_POST['newBookId'];
  $newBookTitle = $_POST['newBookTitle'];

  $query="UPDATE book SET bookId='" . $newBookId . "', title='" . $newBookTitle . "' WHERE bookId='" . $bookId . "';";

  if ( !($result = mysqli_query($dbc, $query))) {
    print "could not execute $query";
    die ( mysqli_error() );
  } else {
    $announcement = "Successfully modify data";
  }

  mysqli_close( $dbc );
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Cuong Quoc Dao">
    <meta name="student ID" content="19789590">
    <meta name="description" content="assignment 1">
    <link type="text/css" rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="../js/generaljs.js"></script>
    <title>Online books station | Database inserting</title>
  </head>

  <body onload="redirect('selection')">
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
      <section class="announcement">
        <div class="container">
          <div id="announcement">
            <p><?php echo $announcement ?><br>Redirect to selection page in 5 seconds</p>
          </div>
        </div>
      </section>
      <!-- end main body -->

      <footer>
        <h4>Assignment 1 - 19789590 - Cuong Quoc Dao</h4>
      </footer>
  </body>
</html>
