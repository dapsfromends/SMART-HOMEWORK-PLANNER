<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>My Reminders</title>
        <link rel="stylesheet" href="assets/CSS/styles.css">
        <style>
        body
        {
            font-family: Arial, Helvetica, sans-serif;
            background-color: whitesmoke;
        }

        .containers
        {
            max-width: 500px;
            margin: auto;
            background-color: paleturquoise;
            padding: 1px 20px 20px 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        

        label,
        input,
        button
        {
            margin: 10px, 0;
            box-sizing: border-box;
        }

        input
        {
            width: 100%;
            margin-top: 5px;
        }

        table
        {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td
        {
            padding: 5px;
            border: 1px solid papayawhip;
            text-align: center;
        }

        th
        {
            background-color: navy;
            color: whitesmoke;
        }     

        button
        {
            background-color: navy;
            color: whitesmoke;
            padding: 5px;
            border: none;
        }

        button:hover 
        {
            background-color: navy;
        }
        </style>
    </head>

    <body>
        <header>
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <h1>Smart Homework Planner</h1>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="profile1.php">Planner</a></li>
                            <li><a href="reminder.php">My Reminders</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="logout.php">Sign out</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <main>
            <div class="containers">
                <h2 style="text-align: center">My Reminder</h2>
                <label for="">Title:</label>
                <input type="text" id="title" />
                <label for="">Description</label>
                <input type="text" id="description" />
                <label for="">Date:</label>
                <input type="date" id="date" />
                <label for="">Time:</label>
                <input type="time" id="time" />
                <button style="width: 100%" onclick="scheduleReminder();">Schedule Reminder</button>
            
                <table border="1">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date & Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="reminderTableBody"></tbody>
                </table>
            </div>
            <audio src="notification.wav" id="notificationSound"></audio>
            <script>
            var timeoutIds = [];
            function scheduleReminder()
            {
                var title = document.getElementById("title").value;
                var description = document.getElementById("description").value;
                var date = document.getElementById("date").value;
                var time = document.getElementById("time").value;
            
                var dateTimeString = date + " " + time;
                var scheduledTime = new Date(dateTimeString);
                var currentTime = new Date();
                var timeDifference = scheduledTime - currentTime;
                if (timeDifference > 0)
                {
                    addReminder(title, description, dateTimeString);
                    var timeoutId = setTimeout(function () 
                    {
                        document.getElementById("notificationSound").play();
                        var notification = new Notification(title,
                        {
                            body: description,
                            requireInteraction: true,
                        });
                    },
                    timeDifference);
                    timeoutIds.push(timeoutId);
                }
                else
                {
                    alert("The scheduled time is in the past!");
                }
            }

            function addReminder(title, description, dateTimeString)
            {
                var tableBody = document.getElementById("reminderTableBody");

                var row = tableBody.insertRow();

                var titleCell = row.insertCell(0);
                var descriptionCell = row.insertCell(1);
                var dateTimeCell = row.insertCell(2);
                var actionCell = row.insertCell(3);

                titleCell.innerHTML = title;
                descriptionCell.innerHTML = description;
                dateTimeCell.innerHTML = dateTimeString;
                actionCell.innerHTML ='<button onclick = "deleteReminder(this);">Delete</button>';
            }

            function deleteReminder(button)
            {
                var row = button.closest("tr");
                var index = row.rowIndex;

                clearTimeout(timeoutIds[index - 1]);
                timeoutIds.splice(index - 1, 1);

                row.remove();
            }

            function handleNotification(title, description)
            {
                if ("Notification" in window)
                {
                    Notification.requestPermission().then(function (permission)
                    {
                        if (permission === "granted")
                        {
                            var notification = new Notification(title,
                            {
                                body: description,
                            });
                        }
                        else
                        {
                            alert("Please allow notification access!");
                        }
                    });
                }
            }
            </script>
        </main>
    </body>
</html>
