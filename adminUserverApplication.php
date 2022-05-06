<?php
  include 'includes/dbcon.php';

  $get_file_query = "SELECT Validity_ID, ValidID, File, Email, refercode FROM validity";
  $run_get_file_query = mysqli_query($dbcon, $get_file_query);
  $get_results = mysqli_fetch_all($run_get_file_query,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity= "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">

    <title>Admin - Review UServer Application</title>
    <style>
      table{
        margin-left: auto;
        margin-right: auto;
        margin-top: 50px;
      }
      h2{
        margin-top:20px;
        text-align:center;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 50px;
      }
      #image{
        width: 450px;
      }
    </style>
  </head>
  <body>
      <h2>Review UServer Application</h2>
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>Email</th>
            <th>Valid ID</th>
            <th>Supporting Document (Certificate)</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($get_results as $result): ?>
          <tr>
            <td><?php echo $result['Email'];?></td>
            <td>
            <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              View image
            </button>
            <!-- Modal -->
            <div class="modal fade"
                id="exampleModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true">

                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <!-- Add image inside the body of modal -->
                        <div class="modal-body">
                            <img id="image" src= "<?php echo $result['ValidID'];?>"
                                alt="Click on button" />
                        </div>

                        <div class="modal-footer">
                            <button type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal">
                                Close
                        </button>
                        </div>
                    </div>
                </div>
            </div>

              <?php //echo $result['ValidID'];?>
            </td>
            <td>
              <?php //echo $result['File'];?>
              <form action="readPDF.php" method="POST">
                <input type="hidden" name="cert_file" value="<?php echo $result['File']?>">
                <button type="submit" name="cert" class="btn btn-primary">View Document</button>
              </form>
            </td>
            <td>
              <form action="adminController.php" method="POST">
                <!-- <input type="hidden" name="name" value="">-->
                <input type="hidden" name="validity_id" value="<?php echo $result['Validity_ID'];?>">
                <input type="hidden" name="Email" value="<?php echo $result['Email'];?>">
                <input type="hidden" name="referral_code" value="<?php echo $result['refercode']; ?>">
                <input type="submit" name="sendEmail" value="Approve" class="btn btn-success">
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <!-- Adding scripts to use bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity= "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity= "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
  </body>
</html>
