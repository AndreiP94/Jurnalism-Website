<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .header-buttons {
            float: right;
            margin-top: 8px;
            margin-right: 10px;
        }
        .header-buttons .button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
        .article-list {
            margin: 20px auto;
            width: 80%;
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .article-list h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .article-list table {
            width: 100%;
            border-collapse: collapse;
        }
        .article-list table th, .article-list table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .article-list table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .article-list table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .article-list table tr:hover {
            background-color: #f1f1f1;
        }
        .article-list table td a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
<header>
    <p>Bine ai venit!</p>
    <div class="header-buttons">
        <a href="index.php" class="button">Delogare</a>
    </div>
</header>

<div class="article-list">
    <h2>Articole în așteptare</h2>


    <?php
    include_once 'Database.php';
    include_once 'Articol.php';


    $database = new Database();
    $db = $database->connect();


    $articol = new Articol($db);


    $articoleAsteptare = $articol->getArticlesInReview();

    if (count($articoleAsteptare) > 0) {
        echo '<table>';
        echo '<tr><th>Titlu</th><th>Prezentare</th><th>Autor</th><th>Data</th><th>Categorie</th><th>Conținut</th><th>Status</th><th>Acțiuni</th></tr>';

      foreach ($articoleAsteptare as $art) {
        echo "<tr>";
        echo "<td>{$art['titlu']}</td>";
        echo "<td>{$art['prezentare']}</td>";
        echo "<td>{$art['autor']}</td>";
        echo "<td>{$art['data']}</td>";
        echo "<td>{$art['categorie']}</td>";
        echo "<td>{$art['continut']}</td>";
        echo "<td>{$art['status']}</td>";
        echo "<td><div class='action-menu'>
                  <div class='dropdown-content'>
                    <p> <a href='proceseaza_status.php?id={$art['id']}&status=aprobat'>Aproba</a></p>
                      <p><a href='proceseaza_status.php?id={$art['id']}&status=refuzat'>Refuză</a></p>
                      <a href='proceseaza_status.php?id={$art['id']}&status=sters'>Șterge</a>
                  </div>
              </div></td>";
        echo "</tr>";
        }

        echo '</table>';
    } else {
        echo '<p>Nu există articole în așteptare.</p>';
    }
    ?>

</div>

</body>
</html>