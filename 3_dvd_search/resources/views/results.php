<!DOCTYPE>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Results</title>
  </head>

  <body>
    <p>
      You searched for: <?php echo $searchTerm ?>
      <br>
      Genre: <?php echo $searchGenre ?>
      <br>
      Rating: <?php echo $searchRating ?>
    </p>
    <? if ($mydvds): ?>
      <table border="1">
        <colgroup>
          <col span="1" style="width: 30%;">
          <col span="1" style="width: 10%;">
          <col span="1" style="width: 15%;">
          <col span="1" style="width: 15%;">
          <col span="1" style="width: 15%;">
          <col span="1" style="width: 15%;">
        </colgroup>
        <tr>
          <th>Title</th>
          <th>Genre</th>
          <th>Rating</th>
          <th>Label</th>
          <th>Sound</th>
          <th>Format</th>
        </tr>
        <?php foreach ($mydvds as $mydvd): ?>
        <tr>
          <td>
            <?php echo $mydvd->title ?>
          </td>
          <td>
            <?php echo $mydvd->genre_name ?>
          </td>
          <td>
            <?php echo $mydvd->rating_name ?>
          </td>
          <td>
            <?php echo $mydvd->label_name ?>
          </td>
          <td>
            <?php echo $mydvd->sound_name ?>
          </td>
          <td>
            <?php echo $mydvd->format_name?>
          </td>
        </tr>
    <?php endforeach; ?>
  </table>
<?php else: ?>
  Sorry, there is no DVD that matches your request.
<?php endif; ?>

  </body>
</html>
