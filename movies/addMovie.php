<?php
    require('../templates/header.php');
    if ($_POST) {
      extract($_POST);
      $errors = array();
      if (empty($title)) {
        array_push($errors, 'The title is empty, please add a value');
      } else if (strlen($title) < 5) {
        array_push($errors, 'The title lengh must be at least 5 characters.');
      } else if (strlen($title) > 100) {
        array_push($errors, 'The title lengh must be no more than 100 characters.');
      }

      if (empty($year)) {
          array_push($errors, 'The year is empty, please add a value');
      } else if(strlen($year) > 4 ) {
          array_push($errors, 'The year lengh must be at least 4 numbers.');
      }

      if (empty($director)) {
          array_push($errors, 'The director is empty, please add a value');
      } else if(strlen($director) < 5 ) {
          array_push($errors, 'The director lengh must be at least 5 characters.');
      } else if (strlen($director) > 100) {
          array_push($errors, 'The director lengh must be no more than 100 characters.');
      }

      if (empty($description)) {
          array_push($errors, 'The description is empty, please add a value');
      } else if(strlen($description) < 10 ) {
          array_push($errors, 'The description lengh must be at least 10 characters.');
      } else if (strlen($description) > 65535) {
          array_push($errors, 'The description lengh must be no more than 65535 characters.');
      }

      if (empty($length)) {
          array_push($errors, 'The length is empty, please add a value');
      } else if(strlen($length) > 3 ) {
          array_push($errors, 'The length must be at least 3 numbers.');
      }

      if (empty($genre)) {
        array_push($errors, 'The genre is empty, please add a value');
      } else if (strlen($genre) < 3) {
        array_push($errors, 'The genre lengh must be at least 3 characters.');
      } else if (strlen($genre) > 100) {
        array_push($errors, 'The genre lengh must be no more than 100 characters.');
      }

      if (empty($errors)) {
        $safeTitle = mysqli_real_escape_string($dbc, $title);
        $safeYear = mysqli_real_escape_string($dbc, $year);
        $safeDescription = mysqli_real_escape_string($dbc, $description);
        $safeDirector = mysqli_real_escape_string($dbc, $director);
        $safeLength = mysqli_real_escape_string($dbc, $length);
        $safeGenre = mysqli_real_escape_string($dbc, $genre);

        $sql = "INSERT INTO `director`(`name`) VALUES ('$safeDirector')";
        $result = mysqli_query($dbc, $sql);
        if ($result && mysqli_affected_rows($dbc) > 0) {
          $directorID = $dbc->insert_id;
        } else {
          die('Something went wrong with adding in our director');
        }

        $sql = "INSERT INTO `movies`(`title`, `year`, `description`, `director_id`, `length`, `genre`) VALUES ('$safeTitle', '$safeYear', '$safeDescription', '$directorID','$safeLength','$safeGenre' )";
        $result = mysqli_query($dbc, $sql);
        if ($result && mysqli_affected_rows($dbc) > 0) {
          header('Location: singleMovie.php');
        } else {
            die('Something went wrong with adding in our movies');
        }
      }

    }

?>

        <div class="row mb-2">
            <div class="col">
                <h1>Add New Movie</h1>
            </div>
        </div>

        <?php if($_POST && !empty($errors)): ?>
            <div class="row mb-2">
                <div class="col">
                    <div class="alert alert-danger pb-0" role="alert">
                        <ul>
                            <?php foreach($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row mb-2">
            <div class="col">
                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                      <label for="title">Movie Title</label>
                      <input type="text" class="form-control" name="title"  placeholder="Enter movie title" value="<?php if ($_POST){ echo $title; }; ?>">
                    </div>

                    <div class="form-group">
                      <label for="year">Movie Year</label>
                      <input type="number" autocomplete="off" class="form-control" name="year"  placeholder="Enter the year it was released"max="<?php if ($_POST){ echo $year; }; ?>">
                    </div>


                    <div class="form-group author-group">
                      <label for="author">Director</label>
                      <input type="text" autocomplete="off" class="form-control"  name="director" placeholder="Enter Movie Director" value="<?php if ($_POST){ echo $director; }; ?>">
                    </div>

                    <div class="form-group">
                      <label for="description">Movie Description</label>
                      <textarea class="form-control" name="description" rows="8" cols="80" placeholder="Description about the movie"><?php if ($_POST){ echo $description; }; ?></textarea>
                    </div>

                    <div class="form-group">
                      <label for="year">Movie Length</label>
                      <input type="number" autocomplete="off" class="form-control" name="Length"  placeholder="Enter the movie length" max="<?php if ($_POST){ echo $length; }; ?>">
                    </div>

                    <div class="form-group">
                      <label for="year">Movie Genre</label>
                      <input type="text" autocomplete="off" class="form-control" name="genre"  placeholder="Enter the movie genre" value="<?php if ($_POST){ echo $genre; }; ?>">
                    </div>

                    <div class="form-group">
                        <label for="file">Upload an Image</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>

                    <button type="submit" class="btn btn-outline-info btn-block">Submit</button>
                </form>
            </div>
        </div>

<?php require('../templates/footer.php'); ?>
