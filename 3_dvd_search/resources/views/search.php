<!DOCTYPE>
<html>
  <head>
    <meta charset="UTF-8">
     <title>DVD Search</title>
  </head>

  <body>
    <form action="/dvds" method="get">
      DVD: <input type="text" name="dvd_input">
      <br>
       Select Genre: <select name="Genres">
         <option value="all">
           All
         </option>
          <?php foreach ($allgenres as $genre): ?>
            <option value="<?php echo $genre->genre_name ?>">
              <?php echo $genre->genre_name ?>
            </option>
          <?php endforeach; ?>
      </select>
      <br>
      Select Rating: <select name="Ratings">
        <option value="all">
          All
        </option>
        <?php foreach ($allratings as $rating): ?> {
          <option value="<?php echo $rating->rating_name ?>"> <?php echo $rating->rating_name ?> </option>
        <?php endforeach; ?>
        }
      </select>
      <br>
      <input type="submit" value="search">
    </form>
  </body>
</html>
