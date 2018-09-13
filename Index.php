<html>
<header>
<?php
    include 'View/Header.php';
    //include_once 'global/dbConnect.php';
include_once  'global/ConnectionSingleton.php';

$dbCon = ConnectionSingleton::Instance()->GetCon();

$query = $dbCon -> prepare("select * from sql1701267.article ORDER BY createdOn DESC ");

$success = $query -> execute();
$result = $query -> fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $item) {
    echo $item["headline"];

}


?>
</header>
<body class="">
<div class="container">
    <div class="row" style="height: 300px;">
        <div class="col-md-4 bg-info">
            <div class="container mt-3">
                <div class="card" >
                    <img class="card-img-top img-fluid " src="uploads/articles/killika.jpg" style="height: 200px;width: auto; overflow: hidden" >
                    <div class="card-body">
                        <h4 class="card-title my-1"> Title Here</h4>
                        <p class="card-text mb-1">description here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<footer class="fixed-bottom">
<?php
    $pathToPage = 'TODO: CREATE PAGE';
    include 'View/Footer.php';
?>
</footer>
</html>


