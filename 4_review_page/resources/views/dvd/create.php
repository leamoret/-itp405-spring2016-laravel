<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Review</title>
  </head>

  <body>
    <h3>Review This DVD</h3>

    <?php if(session('success')): ?>
      <p>
        Review was successfully added.
      </p>
    <?php endif; ?>

    <?php if (count($errors) > 0) : ?>
      <ul>
      <?php foreach ($errors->all() as $error): ?>
        <li>
          <?php echo $error; ?>
        </li>
      </ul>

      <?php endforeach; ?>
    <?php endif ?>

    <?php foreach ($info_dvd as $info_d): ?>
      Title:
      <?php echo $info_d->title; ?>
      <br>
      Genre:
      <?php echo $info_d->genre_name; ?>
      <br>
      Rating:
      <?php echo $info_d->rating_name; ?>
      <br>
      Format:
      <?php echo $info_d->format_name; ?>
      <br>
    <?php endforeach; ?>

    <br>
    <br>

    <form action="/dvd/store" method="post" name="myform">
      <?php echo csrf_field() ?>
      Review Title: <input type="text" name="title">
      <br>
      <br>
      Rating:
      <select name="rating">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
      </select>
      <br>
      <br>
      Description:
      <br>
      <textarea name="description" ></textarea>
      <br>
      <br>
      <input type="submit">
    </form>

    <br>
    <!-- <form action="/dvd/reviews" method="get">
      <button>Display All Reviews</button>
    </form> -->

    <?php if ($all_reviews) ?>
      <table border="1">
        <colgroup>
          <col span="1" style="width: 25%;">
          <col span="1" style="width: 5%;">
          <col span="1" style="width: 70%;">
        </colgroup>
        <tr>
          <th>Title</th>
          <th>Rating</th>
          <th>Description</th>
        </tr>
        <?php foreach ($all_reviews as $review): ?>
        <tr>
          <td>
            <?php echo $review->title ?>
          </td>
          <td>
            <?php echo $review->rating ?>
          </td>
          <td>
            <?php echo $review->description ?>
          </td>
        </tr>
      <?php endforeach; ?>
      </table>

  </body>
</html>
