<input id="todolistid" type="hidden" value=<?=$toDoListid?>>

<section id="todo_s">
<form id="todo_sform">
</form>
<div id="calendar">
</div>
</section>

<section id="buttons_MyCategory">

  <a class="NewTask" data-popup-addTask-open="popup-1" href="#"><img src="images/plus.png"></a>
  <div class="popup-addTask" data-popup-addTask="popup-1">
    <div class="popup-inner-addTask">

      <form id="addTaskForm">
        <input class="inputField-addTask" type="text" id="Description" required="required" name="Description" placeholder="Description">
        <input class="deadline" type="date" name="Deadline" id="Deadline">
        <select class=priority name="Priority" >
            <li><option class="priority1" name="Priority" id="Priority" value="1" href="#">High priority</option></li>
            <li><option class="priority2" name="Priority" id="Priority" value="2" href="#">Medium priority</option></li>
            <li><option class="priority3" name="Priority" id="Priority" value="3" href="#">Low priority</option></li>
        </select>
        <br></br>
        <input id="submit" type="submit" value ="Add Task">
      </form>
      <a class="popup-close-addTask" data-popup-close-addTask="popup-1" href="#"></a>
    </div>
  </div>

  <a href="back.php"><img src="images/back.png"></a>
</section>
