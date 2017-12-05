<?php
  function getAllCategories() {
    global $dbh;
    $stmt = $dbh->prepare("SELECT * FROM category ORDER BY cat_name");
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getAllToDoListsByCategory($cat_id) {
    global $dbh;
    $stmt = $dbh->prepare("SELECT toDo_id, cat_name, toDO_description, toDO_priority,toDO_deadline FROM to_do JOIN category ON(category.cat_id = to_do.cat_id) JOIN usr_info ON(usr_info.usr_id = to_do.usr_id) WHERE category.cat_id=?
    AND usr_info.usr_id=? AND to_do.toDo_isCompleted=?");
    $stmt->execute(array($cat_id,$_SESSION['usr_info']['usr_id'],0));
    return $stmt->fetchAll();
  }

  function getAllToDoListsCompleted() {
    global $dbh;
    $stmt = $dbh->prepare("SELECT toDo_id, toDO_description, cat_name FROM to_do JOIN category ON(category.cat_id = to_do.cat_id) JOIN usr_info ON(usr_info.usr_id = to_do.usr_id) WHERE usr_info.usr_id=? AND to_do.toDo_isCompleted=?");
    $stmt->execute(array($_SESSION['usr_info']['usr_id'],1));
    return $stmt->fetchAll();
  }

  function getAllToDoLists() {
    global $dbh;
    $stmt = $dbh->prepare("SELECT toDo_id, toDO_description, cat_name FROM to_do JOIN category ON(category.cat_id = to_do.cat_id) JOIN usr_info ON(usr_info.usr_id = to_do.usr_id) WHERE usr_info.usr_id=? AND to_do.toDo_isCompleted=?");
    $stmt->execute(array($_SESSION['usr_info']['usr_id'],0));
    return $stmt->fetchAll();
  }

  function getToDo($description) {
    global $dbh;
    $stmt = $dbh->prepare("SELECT toDo_id, toDO_description, cat_name FROM to_do JOIN category ON(category.cat_id = to_do.cat_id) JOIN usr_info ON(usr_info.usr_id = to_do.usr_id) WHERE to_do.toDO_description=? AND usr_info.usr_id=? AND to_do.toDo_isCompleted=?");
    $stmt->execute(array($description,$_SESSION['usr_info']['usr_id'],0));
    return $stmt->fetchAll();
  }

function insert_new_toDoList($category,$description,$priority,$deadline){
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM category WHERE cat_name=?");
  $stmt->execute(array($category));
  $result=$stmt->fetch();

  if(!$result)
      header("Location: logged.php");

  $stmt2 =$dbh->prepare("INSERT INTO to_do(toDO_description,toDO_priority,cat_id,usr_id,toDO_deadline)
  VALUES (?,?,?,?,?)");
  $stmt2->execute(array($description,$priority,$result['cat_id'], $_SESSION['usr_info']['usr_id'],$deadline));
}

function delete_toDo($category,$to_doID){
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM category WHERE cat_name=?");
  $stmt->execute(array($category));
  $result=$stmt->fetch();

  if(!$result)
      header("Location: logged.php");

  $stmt2 =$dbh->prepare("DELETE FROM to_do WHERE toDO_id IN (SELECT toDO_id FROM to_do JOIN category ON(category.cat_id = to_do.cat_id) JOIN usr_info ON(usr_info.usr_id = to_do.usr_id) WHERE category.cat_id=? AND usr_info.usr_id=? AND to_do.toDO_id=?)");
  $stmt2->execute(array($result['cat_id'], $_SESSION['usr_info']['usr_id'], $to_doID));
}


function markAsCompleted_toDo($category,$to_doID){
 // falta a querie
}
?>
