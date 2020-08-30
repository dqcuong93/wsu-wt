<?php
  $dbc= mysqli_connect ('localhost', 'root', '', 'wt19789590')
  OR die (mysqli_connect_error());

  mysqli_set_charset($dbc, 'utf8');

  $option = $_POST['option'];
  $query_columns="SHOW FIELDS IN " .$option;

  if ( !( $columns = mysqli_query($dbc, $query_columns) ) )
  {
    print( "could not execute $query_columns" );
    die ( mysqli_error() );
  }

  mysqli_close( $dbc );

  $count = 0;
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
  <title>Online books station | Database insert form</title>
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
  <section id="db_insert">
    <div class="container">
      <form action="db_insert.php" method="POST">
        <table class="table">
          <caption><h1>Click to the table cell to insert data into <span class="highlight"><?php echo $option?></span> table</h1></caption>
          <tr>
            <?php
              while ($row = mysqli_fetch_row($columns)) {
                print "
                  <th>$row[0]</th>
                ";
                $columns_arr[$count] = $row[0];
                $count++;
              }
            ?>
          </tr>
          <tr>
            <?php
              for($i = 0; $i < $count; $i++) {
                print"
                  <td><input name=\"$columns_arr[$i]\" type=\"text\"></td>
                ";
              }
            ?>
          </tr>
        </table>
        <input type="hidden" name="db_table_name" value="<?php echo $option?>">
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
