<!-- Database access -->
<?php
  $dbc= mysqli_connect ('localhost', 'root', '', 'wt19789590')
  OR die (mysqli_connect_error());

  mysqli_set_charset($dbc, 'utf8');

  $book_title = $_POST['book_title'];
  $bookId = $_POST['bookId'];

  // $query_columns="SHOW FIELDS IN Report";
  // $query_bookInfo="SELECT r.bookId, reviewerId, rating, reviewDate
  //   FROM Report as r inner join Book as b on r.bookId = b.bookId and b.bookId = '" . $bookId . "'";

  $query_bookInfo="
    SELECT DISTINCT b.title, au.authorName, re.reviewerName, rep.rating, rep.reviewDate
    FROM Book b
    INNER JOIN Author au
    INNER JOIN Authorship aus
    INNER JOIN Report rep
    INNER JOIN Reviewer re
    ON au.authorId = aus.authorId
    AND aus.bookId = b.bookId
    AND rep.reviewerId = re.reviewerId
    AND rep.bookId = b.bookId
    AND b.bookId = '" . $bookId . "'";

  if ( !( $result = mysqli_query($dbc, $query_bookInfo) ) )
  {
    print( "could not execute $query_bookInfo" );
    die ( mysqli_error() );
  }

  // if ( !( $columns = mysqli_query($dbc, $query_columns) ) )
  // {
  //   print( "could not execute $query_columns" );
  //   die ( mysqli_error() );
  // }

  mysqli_close( $dbc );
?>
<!-- End database access -->

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
  <title>Online books station | Book information</title>
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
  <section class="data_illustrate">
    <div class="container">
      <table id="data_table" class="table">
        <caption><h1>The table below shows the information related to <span class="highlight"><?php echo $book_title ?></span></h1></caption>
        <tr>
          <!-- Render column headers -->
          <!-- <?php
            // while ($header_row = mysqli_fetch_row($columns)) {
            //   print "
            //     <th>$header_row[0]</th>
            //   ";
            // }
          ?> -->
          <th>Book title</th>
          <th>Author name</th>
          <th>Reviewer name</th>
          <th>Rating</th>
          <th>Review date</th>
        </tr>

        <!-- Render rows of data -->
        <?php
          while ($row = mysqli_fetch_row($result)) {
            print "<tr>";
            foreach ($row as $value) {
              print( "<td>$value</td>" );
            }
            print "</tr>";
          }
        ?>
      </table>
      <button onclick="getHTML('selection')">Go back information selection page</button>
    </div>
  </section>

  <footer>
    <h4>Assignment 1 - 19789590 - Cuong Quoc Dao</h4>
  </footer>
</body>
</html>
