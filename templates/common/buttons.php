<aside id="buttons_MyCategory">
<a class="NewTask" data-popup-addTask-open="popup-1" href="#"><img src="images/plus.png"></a>
   <div class="popup-addTask" data-popup-addTask="popup-1">
       <div class="popup-inner-addTask">

       <form action="newToDoList.php" >
             <select class="dropdown"name="Category" >
             <?php foreach ($categories as $category) { ?>
                 <li><option class="cat" id="Category" name="Category" href="#"><?=$category['cat_name']?></option></li>
              <?php } ?>
             </select>
           <input class="inputField-addTask" type="text" id="Name" required="required" name="Name" placeholder="Name">
           <br></br>
           <input id="submit" type="submit" value ="Add List">
       </form>

         <a class="popup-close-addTask" data-popup-close-addTask="popup-1" href="#"></a>
       </div>
     </div>

<a class="markTask" data-popup-markTask-open="popup-1" href="#"><img src="images/completed.png"></a>
  <div class="popup-markTask" data-popup-markTask="popup-1">
    <div class="popup-inner-markTask">

      <form id=markTask >

      <select class="dropdown" id="todolistToMark" name="todolistToMark" >
      <?php foreach ($toDoLists as $toDoList) { ?>
        <li> <option class="inputField-deleteTask" id="todolistToMark_id" name="todolistToMark_id" href="#" value="<?=$toDoList['toDoList_id']?>"><?=$toDoList['toDoList_name']?></option></li>
       <?php } ?>
    </select>

      <br></br>
        <input id="submit" type="submit" value ="Complete">
      </form>

      <a class="popup-close-markTask" data-popup-close-markTask="popup-1" href="#"></a>
    </div>
  </div>

  <a class="delete_task" data-popup-deleteTask-open="popup-1" href="#"><img src="images/delete.png"></a>
  <div class="popup-deleteTask" data-popup-deleteTask="popup-1">
    <div class="popup-inner-deleteTask">

      <form id=delete_task>

      <select class="dropdown" id="todolistToEliminate" name="todolistToElimnate" >
        <?php foreach ($toDoLists as $toDoList) { ?>
          <li> <option class="inputField-deleteTask" id="todolistToMark_id" name="todolistToMark_id" href="#" value="<?=$toDoList['toDoList_id']?>"><?=$toDoList['toDoList_name']?></option></li>
         <?php } ?>
      </select>

        <br></br>
        <input id="submit" type="submit" value ="Delete">
      </form>

      <a class="popup-close-deleteTask" data-popup-close-deleteTask="popup-1" href="#"></a>
    </div>
  </div>

  <a href="back.php"><img src="images/back.png"></a>
</aside>
