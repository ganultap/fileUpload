<div class="container-sm">
    <div class="row">
        <div class="card-body mt-2 mb-2">
            <div class="card-header bg-info shadow-lg">
                <h4 class="text-light text-center">VALIDATION</h4>
            </div>
            <div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
</div>
            <div class="card-body shadow-lg p-3 bg-white text-dark">
                <div class="row">
                    <div class="col-sm-12">
                        <?php 
                    echo ("$result <br>");
                    echo ucwords(("<p>First Name:   $firstname</p>")); 
                    echo ucwords(("<p>Last Name:    $lastname</p>"));
                    echo ucwords(("<p>Middle Name:  $middlename</p>"));
                    echo ucwords(("<p>Address:  $address</p>"));
                    $newDate = date("m-d-Y", strtotime($birthdate));
                    echo ("<p>Birthday:  $newDate</p>");
                    echo ucwords(("<p>Birth Place:  $birthplace</p>"));
                    echo ("<p>Gender:  $gender</p>");
                    echo ucwords(("<p>Guardian:  $guardian</p>"));
                    echo ("<p>Contact:  $contacts</p>");
                    echo ("<p>Status:  $status</p>");
                    echo ("<p>Year Level:  $yearlevel</p>");
                    echo ("<p>Course:  $course</p>");
                    echo ("<p>School Year:  $schoolyear</p>");
                    echo ("<p>Email:  $email</p>");
                ?>
                    </div>
                </div>
            </div>
            <div class="card-footer shadow-lg bg-info text-center text-light small">
                Copyright &copy; 2020
            </div>
        </div>
    </div>
</div>