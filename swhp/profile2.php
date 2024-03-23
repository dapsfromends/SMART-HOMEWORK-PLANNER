<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="style3.css">
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
              <li><a href="logout.html">Log Out</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <div class="container" style="margin-top: 50px; margin-bottom: 50px">
      <div class="row" style="margin-bottom: 50px">
        <div class="col-md-12">
          <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#addTaskModal"
          >
            Add New Task
          </button>

          <form
            method="POST"
            onsubmit="return taskObj.deleteProject(this);"
            style="display: contents"
          >
            <select
              name="project"
              class="form-control"
              style="
                display: initial;
                width: 200px;
                margin-left: 5px;
                margin-right: 5px;
              "
              id="form-task-hour-calculator-all-projects"
            ></select>
            <input
              type="submit"
              class="btn btn-danger"
              value="Delete Project"
            />
          </form>
        </div>
      </div>
    </div>

    <table class="table">
      <caption class="text-center">
        All Tasks
      </caption>
      <tr>
        <th>Task</th>
        <th>Project</th>
        <th>Status</th>
        <th>Duration</th>
        <th>Date</th>
        <th>Action</th>
      </tr>

      <tbody id="all-tasks"></tbody>
    </table>

    <div class="modal fade" id="addTaskModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add New Task</h5>
            <button class="close" type="button" data-dismiss="modal">x</button>
          </div>

          <div class="modal-body">
            <form
              method="POST"
              onsubmit="return taskObj.addTask(this);"
              id="form-task-hour-calculator"
            >
              <div class="form-group">
                <label>Project</label>
                <select
                  name="project"
                  id="add-task-project"
                  class="form-control"
                  required
                ></select>
              </div>

              <div class="form-group">
                <label>New Project</label>
                <input
                  type="text"
                  name="new_project"
                  id="add-project"
                  class="form-control"
                  placeholder="Project Name"
                />

                <button
                  type="button"
                  onclick="taskObj.addProject();"
                  class="btn btn-primary"
                  style="margin-top: 10px"
                >
                  Add Project
                </button>
              </div>

              <div class="form-group">
                <label>Task</label>
                <input
                  type="text"
                  name="task"
                  class="form-control"
                  placeholder="What are you going to do ?"
                  required
                />
              </div>
            </form>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Close
            </button>
            <button
              type="submit"
              form="form-task-hour-calculator"
              class="btn btn-primary"
            >
              Add Task
            </button>
          </div>
        </div>
      </div>
    </div>

    <script src="script3.js"></script>
  </body>
</html>
