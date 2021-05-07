<?php
  $date = get_the_date(
    "Y/m/",
    get_posts(array(
      "numberposts" => 1
    ))[0]
  );

  header("Location: /$date");
  die();