<?php
  session_start();

  // ログインせずにこのサイトに飛んだら、強制的にログイン画面に遷移
  if(!isset($_SESSION["name"])){
    header("Location: ../index.php");
  }
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Specula</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/styles.css" />
  </head>

  <body>
    <!-- メニューバー -->
    <header>
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav4"
          aria-controls="navbarNav4"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php"><i class="fas fa-glasses"></i> Specula</a>
        <div class="collapse navbar-collapse" id="navbarNav4">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                アカウント
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="info/">基本情報</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">ログアウト</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="table/">テーブル</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- main -->
    <div class="container">
      <main>
        <div class="text-center mt-5 mb-5">
          <h2>ステータス画面</h2>
        </div>

        <!-- サーバーの利用状況をテーブルで表示 -->
        <div class="table-responsive">
          <!-- ボタンの説明 -->
          <div class="text-right">
            <p>
              <span class="mgr-10"> <i class="fas fa-circle" style="color: #78ff94;"></i>：ON </span>
              <i class="fas fa-circle" style="color: #ff0000;"></i>：OFF
            </p>
          </div>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>IP</th>
                <th>名前</th>
                <th>最終アクセス</th>
                <th>状態</th>
              </tr>
            </thead>
            <tbody id="lists"></tbody>
          </table>
        </div>

        <div class="text-center head-border">
          <?php
            printf("<h2 class='user-name'>- ".$_SESSION["name"]." -</h2>");
          ?>
        </div>

        <!-- サーバーの利用状況をテーブルで表示 -->
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>IP</th>
                <th>スイッチ</th>
              </tr>
            </thead>
            <tbody id="login-lists"></tbody>
          </table>
        </div>
      </main>
    </div>

    <footer class="footer">
      <p class="text-muted text-center">Copyright(C) Akagi Kaito All Rights Reserved.</p>
    </footer>

    <!-- webAPIを叩く -->
    <script src="call-api.js"></script>
    <!-- ログインユーザーと同じIPのユーザーを表示 -->
    <script src="ip-same-users.js"></script>
    <!-- ログインユーザーの使用状況を表示 -->
    <script src="login-user.js"></script>
    <!-- 同じサーバー(IP)を使用しているユーザーの使用状況のみ表示 -->
    <script src="main.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"
      integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
