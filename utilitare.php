<?php
  // function that checks for the exitence of the 'restrictionat' cookie
  // and its value
  function isAllowed () {
    if (isset($_COOKIE['restrictionat'])) {
      $valoareCookie = $_COOKIE['restrictionat'];
      $encryptedDragos = base64_encode('Dragos');
      $encryptedAna = base64_encode('Ana');

      if ($valoareCookie === $encryptedDragos || $valoareCookie === $encryptedAna) {
        return "yes";
      } else {
        return "no";
      }
    } else {
      return "no user";
    }
  }

  // function that decodes the restrictionat cookie value
  function getUser () {
    if (isset($_COOKIE['restrictionat'])) {
      $valoareCookie = $_COOKIE['restrictionat'];
      return base64_decode($valoareCookie);
    }

    return null;
  }

  // sterge un cookie primit ca parametru
  function deleteCookie ($cookieName) {
    if (isset($_COOKIE[$cookieName])) {
      setcookie($cookieName, '', time() - 3600);
    }
  }

  // verifica user si parola
  function checkUserAndPassword ($user, $password) {
    if ($user === 'Dragos' && $password === 'Dragos') {
      return true;
    } else if ($user === 'Ana' && $password === 'Ana') {
      return true;
    } else if (empty($user) || empty($password)) {
      return "empty credentials";
    } else {
      return false;
    }
  }
?>