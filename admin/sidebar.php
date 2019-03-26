<div class="sidebar">
  <!--
  Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
-->
<div class="sidebar-wrapper">
  <div class="logo">
    <a href="javascript:void(0)" class="simple-text logo-normal" style="text-align:center;">
      <img src="../resources/images/png/sw.png" alt="silverworks" width="45">

    </a>

  </div>

  <ul class="nav">
    <li class="<?php //if ($_SERVER['PHP_SELF'] == 'geologin/admin/' || $_SERVER['PHP_SELF'] == 'geologin/admin/index'){ echo "Active"; }?>">
      <a href="./">
        <i class="tim-icons icon-chart-pie-36"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <hr style="background-color:#EEA7E7; width:85%;"/>
    <li class="<?php //if ($_SERVER['PHP_SELF'] == './user'){ echo "Active"; }?>">
      <a href="./employees">
        <i class="fas fa-users"></i>
        <p>Employees</p>
      </a>
    </li>
    <li class="<?php //if ($_SERVER['PHP_SELF'] == './user'){ echo "Active"; }?>">
      <a href="./user">
        <i class="tim-icons icon-single-02"></i>
        <p>Users</p>
      </a>
    </li>
  </ul>
</div>
</div>
