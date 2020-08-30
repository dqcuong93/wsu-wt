<!-- Database access -->
<?php
  $dbc= mysqli_connect ('localhost', 'root', '', 'wt19789590')
  OR die (mysqli_connect_error());

  mysqli_set_charset($dbc, 'utf8');

  $option = $_POST['option'];
  $query_all="SELECT * FROM " . $option;
  $query_columns="SHOW FIELDS IN " .$option;

  if ( !( $result = mysqli_query($dbc, $query_all) ) )
  {
    print( "could not execute $query_all" );
    die ( mysqli_error() );
  }

  if ( !( $columns = mysqli_query($dbc, $query_columns) ) )
  {
    print( "could not execute $query_columns" );
    die ( mysqli_error() );
  }

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
  <title>Online books station | Shopping data</title>
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
        <caption><h1>The table below shows the data of <span class="highlight"><?php echo $option ?></span></h1></caption>
        <tr>
          <!-- Render column headers -->
          <?php
            while ($header_row = mysqli_fetch_row($columns)) {
              print "
                <th>$header_row[0]</th>
              ";
            }
          ?>
        </tr>

        <!-- Render rows of data -->
        <?php
          $count = 0;
          while ($row = mysqli_fetch_row($result)) {
            $data_arr[$count] = $row;
            print "<tr>";
            foreach ($row as $value) {
              print( "<td>$value</td>" );
            }
            print "</tr>";
            $count++;
          }
        ?>
      </table>
      <button onclick="getHTML('selection')">Go back information selection page</button>
      <?php
        if ($option == 'Book') {
          print "
            <div id=\"more_option\">
              <h3>More options below</h3>
              <form id=\"book_review_form\" method=\"POST\" action=\"book_review.php\">
                <input id=\"book_title\" type=\"hidden\" name=\"book_title\" value=\"\">
                <div id=\"action_label\">
                  <label><input type=\"radio\" name=\"data_action\" value=\"review\">Get review information</label>
                  <label><input type=\"radio\" name=\"data_action\" value=\"modify\">Modify data</label>
                </div>
                <div id=\"book_select\">
                  <h4>Select a book</h4>
                  <select name=\"bookId\" onchange=\"changeTitle(this);\">
                    <option selected disabled >Choose one book</option>
          ";
          foreach ($data_arr as $value ) {
            echo "<option value=\"$value[0]\">";
            echo $value[1];
            echo "</option>";
          }
          print "
                  </select>
                </div>
              </form>
            </div>
          ";
        }
      ?>
    </div>
  </section>

  <footer>
    <h4>Assignment 1 - 19789590 - Cuong Quoc Dao</h4>
  </footer>
</body>
</html>
