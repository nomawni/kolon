
    <form role="form" action="/admin/checkLogin" method="post" class="_formAuth">
<h1> User authentication </h1>

<h2 class="text-center"> Login </h2>
<?php  if($user->hasFlash()) { ?>
<div class="alert alert-danger">
    <strong><?php $user->getFlash(); ?></strong>
</div>
<?php } ?>

    <input type="text" name="login" class="_userAuthentification" placeholder="User name" />
    <input type="password" name="password" class="_userAuthentification"/ placeholder="Password">

    <input type="submit" value="login">
        
    </form>