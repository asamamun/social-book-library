<?php
require "./get_count.php"; 
?>
<!DOCTYPE html>
<html>

<head> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <p class="text-center fs-1 text-success">Welcome to Dashboard</p>
        <div class="row border py-3 text-bg-secondary  ">
            <!-- first row -->
            <div class="row mt-3 ">
                <div class="col-2"></div>
                <div class="col-3">
                    <div class="card border-primary mb-3 text-center bg-info  rounded-5 " style="max-width: 18rem;">
                        <div class="card-header fs-4  text-light">All Books</div>
                        <div class="card-body text-primary">
                            <h5 class="card-title">Count</h5>
                            <p class="card-text text-dark fs-4"><?= $arr['books']?></p>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
                <div class="col-3">
                    <div class="card border-primary mb-3 text-center bg-info  rounded-5" style="max-width: 18rem;">
                        <div class="card-header  fs-4 text-light">All Users </div>
                        <div class="card-body text-primary">
                            <h5 class="card-title">Count</h5>
                            <p class="card-text text-dark fs-4"><?= $arr['users']?> </p>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <!-- second row -->
            <div class="row mt-5">
                <div class="col-2"></div>
                <div class="col-3">
                    <div class="card border-primary mb-3 text-center bg-info rounded-5" style="max-width: 18rem;">
                        <div class="card-header  fs-4 text-light">All Publishers</div>
                        <div class="card-body text-primary">
                            <h5 class="card-title">Count</h5>
                            <p class="card-text text-dark fs-4"><?= $arr['publishers']?></p>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
                <div class="col-3">
                    <div class="card border-primary mb-3 text-center bg-info rounded-5" style="max-width: 18rem;">
                        <div class="card-header  fs-4  text-light">All Writter </div>
                        <div class="card-body text-primary">
                            <h5 class="card-title">Count</h5>
                            <p class="card-text text-dark fs-4"><?= $arr['writers']?> </p>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <!-- third row -->
            <!-- <div class="row">
                <div class="col-2"></div>
                <div class="col-3">
                    <div class="card border-primary mb-3 text-center" style="max-width: 18rem;">
                        <div class="card-header">All Division</div>
                        <div class="card-body text-primary">
                            <h5 class="card-title">Count</h5>
                            <p class="card-text"><?= $arr['division']?></p>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
                <div class="col-3">
                    <div class="card border-primary mb-3 text-center" style="max-width: 18rem;">
                        <div class="card-header">All District </div>
                        <div class="card-body text-primary">
                            <h5 class="card-title">Count</h5>
                            <p class="card-text"><?= $arr['district']?> </p>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div> -->
        </div>
    </div>

    <script src="./get_count.php"></script>
     
</body>

</html>