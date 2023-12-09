<?php
  // include fisierul utilitare
  include 'utilitare.php';
  $hasAccess = isAllowed();

  if ($hasAccess === "yes") {
    header('Location: secret.php');
  } else if ($hasAccess === "no") {
    header('Location: is_restricted.php');
  } else {
    if (isset($_POST['user'])) {
      $user = $_POST['user'];
      $password = $_POST['password'];

      $userAndPassCorrect = checkUserAndPassword($user, $password);

      if ($userAndPassCorrect === true) {
        // encrypt the username
        $encryptedUser = base64_encode($user);
        setcookie('restrictionat', $encryptedUser, time() + 60 * 60 * 24 * 30);
        header('Location: index.php');
        $form = false;
      } else if ($userAndPassCorrect === "empty credentials") {
        $message = 'Completati ambele campuri';
        $form = true;
      } else {
        $message = 'Datele introduse nu sunt corecte';
        $form = true;
      }
    } else {
      $form = true;
    }
  }
?>

<?php if(isset($form) && $form === true): ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    form {
      max-width: 200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr;
      grid-gap: 0.5em;
    }
    label {
      display: flex;
      flex-direction: column;
    }
  </style>
</head>
<body>
  <form action="index.php" method="post">
    <label for="user">
      Username
      <input type="text" name="user">
    </label>
    <label for="password">
      Password
      <input type="password" name="password">
    </label>
    <input type="submit" value="Login">
    <?php if(isset($message) && !empty($message)): ?>
      <p style="color: red">
        <?php echo $message; ?>
      </p>
    <?php endif; ?>
  </form>
</body>
</html>
<?php endif; ?>