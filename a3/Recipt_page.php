<?php 
session_start();


echo("recipt page");

  ?>



<aside id="debug">
      <hr>
      <h3>Debug Area</h3>
      <pre>
      GET Contains:
  <?php print_r($_POST) ?>
  POST Contains:
  <?php print_r($_POST) ?>
  SESSION Contains:
  <?php print_r($_SESSION) ?>
      </pre>
    </aside>
