<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> 削除 </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- メニューバー -->
  <header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4"
        aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.html">BisLab Server</a>
      <div class="collapse navbar-collapse" id="navbarNav4">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="register.php">新規登録</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="status.php">使用状況の管理</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="container">

    <main>
      <?php
        require "function.php";

        if (isset($_GET["name"])){
          $id = htmlspecialchars($_GET["name"]);
          $stmt = exeSQL("SELECT ip, user FROM user_table WHERE id = '".$id."'");
          $rec = $stmt->fetch(PDO::FETCH_BOTH);

          printf("<div class='text-center mt-5 mb-5'>");
          printf("<h2>削除しますか？</h2>");
          printf("</div>");
          printf("<div class='table-responsive'>");
          printf("<table class='table table-bordered table-striped'>");
          printf("<thead>");
          printf("<tr>");
          printf("<th>IP</th>");
          printf("<th>名前</th>");
          printf("</tr>");
          printf("</thead>");
          printf("<tbody>");
          printf("<tr>");
          printf("<td>%s</td>", $rec["ip"]);
          printf("<td>%s</td>", $rec["user"]);
          printf("</tr>");
          printf("</tbody>");
          printf("</table>");
          printf("</div>");
          printf("<br>");

          if (isset($_POST["delete"])){
            $stmt = exeSQL("DELETE FROM user_table WHERE id = '".$id."'");
            header("Location: index.html"); //削除作業後に利用者管理画面に戻る
            exit();
          }
        }

    ?>

      <br>
      <hr>
      <br>
      <form method="post" action="">
        <div class='form-group'>
          <div cass="form-inline">
            <button type="button" class="btn btn-secondary float-left" onClick="location.href='index.html'">Cancel</button>
            <button type="submit" class="btn btn-danger float-right" name="delete">Delete</button>
          </div>
        </div>
      </form>

    </main>
  </div>

  <footer class="footer">
    <p class="text-muted text-center">Copyright(C) Akagi Kaito All Rights Reserved.</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

</body>

</html>