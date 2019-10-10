<?php require('../templates/header.php'); ?>

        <div class="row mb-2">
            <div class="col">
                <h1>Iron Man 1</h1>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <a class="btn btn-outline-primary" href="">Edit</a>
                <button class="btn btn-outline-danger" type="button" name="button" data-toggle="modal" data-target="#confirmModal">Delete</button>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-12 col-sm-4 align-self-center">
                <img class="img-fluid" src="images/IronMan1.jpg" alt="">
            </div>
            <div class="col-12 col-sm-8 align-self-center">
                <h3>Iron Man</h3>
                <h4>Jon Favreau</h4>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-12">
                <p>After being held captive in an Afghan cave, billionaire engineer Tony Stark creates a unique weaponized suit of armor to fight evil.</p>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete Iron Man 1</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Confirm Delete</button>
                </div>
            </div>
        </div>

<?php require('../templates/footer.php'); ?>
