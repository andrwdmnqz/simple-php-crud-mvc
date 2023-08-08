<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax jquery crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1 class="text-center my-3">Simple PHP ajax jquery CRUD</h1>
    <button class="btn btn-dark my-3" data-toggle="modal" data-target="#exampleModal">Add user</button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="#createname">Name: </label>
                <input type="text" class="form-control" name="createname" id="createname" required>

                <label for="#createemail">Email: </label>
                <input type="text" class="form-control" name="createemail" id="createemail" required>

                <label for="#createpassword">Password: </label>
                <input type="password" class="form-control" name="createpassword" id="createpassword" required>

                <label for="#creategender">Gender: </label> <br>
                <input type="radio" class="mr-2 ml-2" name="creategender" value="male" id="creategender_male" required>Male
                <input type="radio" class="mr-2 ml-2" name="creategender" value="female" id="creategender_female" required>Female <br> <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="addUser()">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="#updatename">Name: </label>
                <input type="text" class="form-control" name="updatename" id="updatename" required>

                <label for="#updateemail">Email: </label>
                <input type="text" class="form-control" name="updateemail" id="updateemail" required>

                <label for="#updatepassword">Password: </label>
                <input type="password" class="form-control" name="updatepassword" id="updatepassword" required>

                <label for="#updategender">Gender: </label> <br>
                <input type="radio" class="mr-2 ml-2" name="updategender" value="male" id="updategender_male" required>Male
                <input type="radio" class="mr-2 ml-2" name="updategender" value="female" id="updategender_female" required>Female <br> <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="updateUser()">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="hidden" id="hidden">
            </div>
        </div>
    </div>
</div>

<div id="displayDataTable" class="container my-3">

</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        displayData();
    });

    function displayData() {
        var dataToSend = "true";

        $.ajax({
            url: "display.php",
            type: "post",
            data: {
                dataToSend: dataToSend
            },
            success: function(data, status) {
                $('#displayDataTable').html(data);
            }
        });
    }

    function addUser() {
        var createname = $('#createname').val();
        var createemail = $('#createemail').val();
        var createpassword = $('#createpassword').val();
        var creategender = $('input[name="creategender"]:checked').val();

        $.ajax({
            url: "create.php",
            type: "post",
            data: {
                createname: createname,
                createemail: createemail,
                createpassword: createpassword,
                creategender: creategender
            },
            success: function(data, status) {
                $('#exampleModal').modal("hide");
                displayData();
            }
        });
    }

    function deleteUser(id) {
        $.ajax({
            url: "delete.php",
            type: "post",
            data: {
                id: id
            },
            success: function(data, status) {
                displayData();
            }
        });
    }
    function updateDetails(id) {
        $('#hidden').val(id);

        $.post("update.php", {id: id}, function(data, status) {
            var userid = JSON.parse(data);
            $('#updatename').val(userid.name);
            $('#updateemail').val(userid.email);
            $('#updatepassword').val("********");

            if (userid.gender === 'male') {
                $('input[name="updategender"][value="male"]').prop('checked', true);
            } else if (userid.gender === 'female') {
                $('input[name="updategender"][value="female"]').prop('checked', true);
            }
        });

        $('#updateModal').modal("show");
    }
    function updateUser() {
        var hiddenid = $('#hidden').val();
        var updatename = $('#updatename').val();
        var updateemail = $('#updateemail').val();
        var updatepassword = $('#updatepassword').val();
        var updategender = $('input[name="updategender"]:checked').val();

        $.post("update.php", {
            updatename: updatename,
            updateemail: updateemail,
            updatepassword: updatepassword,
            updategender: updategender,
            hiddenid: hiddenid
        }, function(data, status) {
            $('#updateModal').modal("hide");
            displayData();
        });
    }
</script>

</body>
</html>