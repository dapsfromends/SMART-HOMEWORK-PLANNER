<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Reminders</title>
    <link rel="stylesheet" href="assets/CSS/remstyle.css" />
  </head>
  <body>
    <header>
      
        <div class="navbar">
          <div class="logo">
            <h1> &nbsp; &nbsp; Smart Homework Planner</h1>
          </div>
          <nav>
            <ul>
              <li><a href="profile1.php">Planner</a></li>
              <li><a href="reminder.php">My Reminders</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Help</a></li>
              <li><a href="logout.html">Log Out</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <br><br><br><br><br><br><br>
    <div class="container">
      <div class = "heading">
        <h2 style="text-align: center">My Reminders</h2>
        <hr>
      </div>
      <label for="">Title:</label>
      <input type="text" id="title" />
      <label for="">Description</label>
      <input type="text" id="description" />
      <label for="">Date:</label>
      <input type="date" id="date" />
      <label for="">Time:</label>
      <input type="time" id="time" />

      <button style="width: 100%" onclick="scheduleReminder();">
        Schedule Reminder
      </button>

      <br><br><hr><br><br>

      <table class="table">
        <h2 style="text-align: center">All Tasks</h2>
          <thread>
            <tr>
              <th>Title</th>
              <th>Description</th>
              <th>Date & Time</th>
              <th>Action</th>
            </tr>
          </thread>     
        <tbody id="reminderTableBody"></tbody>
      </table>
    </div>

    <audio src="notification.wav" id="notificationSound"></audio>


    <script>
      

      var timeoutIds = [];

      function scheduleReminder() {
        var title = document.getElementById("title").value;
        var description = document.getElementById("description").value;
        var date = document.getElementById("date").value;
        var time = document.getElementById("time").value;

        var dateTimeString = date + " " + time;
        var scheduledTime = new Date(dateTimeString);
        var currentTime = new Date();
        var timeDifference = scheduledTime - currentTime;

        if (timeDifference > 0) {
          addReminder(title, description, dateTimeString);

          var timeoutId = setTimeout(function () {
            document.getElementById("notificationSound").play();
            alert("You have an upcoming assignment!!!");

            var notification = new Notification(title, {
              body: description,
              requireInteraction: true,
            });
          }, timeDifference);

          timeoutIds.push(timeoutId);
        } else {
          alert("The scheduled time is in the past!");
        }
      }

      function addReminder(title, description, dateTimeString) {
        var tableBody = document.getElementById("reminderTableBody");

        var row = tableBody.insertRow();

        var titleCell = row.insertCell(0);
        var descriptionCell = row.insertCell(1);
        var dateTimeCell = row.insertCell(2);
        var actionCell = row.insertCell(3);

        titleCell.innerHTML = title;
        descriptionCell.innerHTML = description;
        dateTimeCell.innerHTML = dateTimeString;
        actionCell.innerHTML =
          '<button onclick = "deleteReminder(this);">Delete</button>';
      }

      function deleteReminder(button) {
        var row = button.closest("tr");
        var index = row.rowIndex;

        clearTimeout(timeoutIds[index - 1]);
        timeoutIds.splice(index - 1, 1);

        row.remove();
      }

      function handleNotification(title, description) {
        if ("Notification" in window) {
          Notification.requestPermission().then(function (permission) {
            if (permission === "granted") {
              var notification = new Notification(title, {
                body: description,
              });
            } else {
              alert("Please allow notification access!");
            }
          });
        }
      }
      window.onbeforeunload = function() {
   localStorage.setItem(title, $('#inputTitle').val());
   localStorage.setItem(description, $('#inputDesceiption').val());
   localStorage.setItem(date, $('#inputDate').val());
   localStorage.setItem(time, $('#inputTime').val());
}
      window.onload = function() {
        var title = localStorage.getItem(title);
        var description = localStorage.getItem(description);
        var date = localStorage.getItem(date);
        var time = localStorage.getItem(time);
        if (title !== null) $('#inputTitle').val(title); if (description !== null) $('#inputDescription').val(description); if (date !== null) $('#inputDate').val(date); if (time !== null) $('#inputTime').val(time);
        // ...
      }
    </script>
  </body>
</html>