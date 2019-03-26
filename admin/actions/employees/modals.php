<!-- modal activate starts here -->

<div class="modal fade" style="background-color:#000000c9;" id="modalactivate<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form class="" action="actions/employees/activate.php" method="post">
    <div class="modal-dialog"  role="document">
      <div class="modal-content" style="background-color:#27293D;">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel" style="color: white;"> Activate User</h4>

        </div>
        <div class="modal-body" style="text-align:center;">
          <h3 style="color: white;">Are You Sure?</h3>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="staffcode" value="<?php echo $result['emp_staffcode'];?>">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Activate</button>
        </div>
      </div>
    </div>
  </form>
</div>

<!-- modal activate ends here -->

<!-- modal deactivate starts here -->

<div class="modal fade" style="background-color:#000000c9;" id="modaldeactivate<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form class="" action="actions/employees/deactivate.php" method="post">
    <div class="modal-dialog"  role="document">
      <div class="modal-content" style="background-color:#27293D;">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel" style="color: white;"> Deactivate User</h4>

        </div>
        <div class="modal-body" style="text-align:center;">
          <h3 style="color: white;">Are You Sure?</h3>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="staffcode" value="<?php echo $result['emp_staffcode'];?>">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Deactivate</button>
        </div>
      </div>
    </div>
  </form>
</div>

<!-- modal deactivate ends here -->

<!-- modal delete starts here -->

<div class="modal fade" style="background-color:#000000c9;" id="modaldelete<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form class="" action="actions/employees/delete.php" method="post">
    <div class="modal-dialog"  role="document">
      <div class="modal-content" style="background-color:#27293D;">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel" style="color: white;"> Delete User</h4>

        </div>
        <div class="modal-body" style="text-align:center;">
          <h3 style="color: white;">Are You Sure?</h3>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="staffcode" value="<?php echo $result['emp_staffcode'];?>">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Delete</button>
        </div>
      </div>
    </div>
  </form>
</div>

<!-- modal delete ends here -->
