function Task(name, state = "active", rowIndex = 0) {
    this._name = name;
    this._state = state;
    this._rowIndex = rowIndex;
}

Task.prototype.setName = function(name) {
    this._name = name;
};

Task.prototype.getName = function() {
    return this._name;
};

Task.prototype.setState = function(state) {
    this._state = state;
};

Task.prototype.getState = function() {
    return this._state;
};

Task.prototype.setRowIndex = function(rowIndex) {
    this._rowIndex = rowIndex;
};

Task.prototype.getRowIndex = function() {
    return this._rowIndex;
};

//////////////////////////////////////////////////////////////////

function TaskList(){
   this._list = [];
}

TaskList.prototype.addTask = function(taskToAdd) {
    this._list.push(taskToAdd);
};

TaskList.prototype.removeTask = function(taskToRemove) {
    console.log(this._list);
    this._list.forEach(function(item, i, arr) {
        if (Object.is(item, taskToRemove)) {

        }
    });
};

TaskList.prototype.getTasks = function() {
    return this._list;
};

///////////////////////////////////////////////////////////////////

var task = new Task('Ivan', "done", 2);
var task2 = new Task("Vital", "active", 3);

var taskList = new TaskList();
taskList.addTask(task);
taskList.addTask(task2);
// console.log(taskList.getTasks());
taskList.removeTask(task2);

// створюємо масив відмічених рядків
var CheckList = function() {
    var rows = [];  // table row indexes
    return {
        processRowIndex: function(rowIndex, checked) {
            if (checked) {
                rows.push(rowIndex);
            } else {
                var a = rows.indexOf(rowIndex);
                if (a != -1) {
                    rows.splice(a, 1);
                }
            }
            rows.sort(function(a, b) {return a-b});
        },
        getRows: function () {
            return rows;
        }
    }
};

var checkList = new CheckList();

var table = document.getElementById("list");
// change task state
table.addEventListener("click", function(event) {
    var node = event.target;
    var row = node.parentNode;

    if (node.innerHTML == "Active") {
        row.setAttribute("data-state", "done");
        node.innerHTML = "Done";
    } else if (node.innerHTML == "Done") {
        row.setAttribute("data-state", "active");
        node.innerHTML = "Active";
    }
});

// remove task
table.addEventListener("click", function(event) {
    if (event.target.tagName == "BUTTON") {
        var td = event.target.parentNode;
        var row = td.parentNode;
        table.deleteRow(row.rowIndex);
    }
});

// get indexes of checked/unchecked rows
table.addEventListener("change", function(event) {
    var target = event.target;
    if (target.tagName == "INPUT" && target.type == "checkbox") {
        var tr = event.target.parentNode.parentNode;
        var rowIndex = tr.rowIndex;
        var checked = target.checked;
        checkList.processRowIndex(rowIndex, checked);
    }
});

var input = document.getElementById("add-new-task");
// add new task
input.addEventListener("keypress", function(event) {
    if (event.key == "Enter") {
        var row = table.insertRow(1);
        row.setAttribute("data-state", "active");

        var cellName = row.insertCell(0);
        var cellState = row.insertCell(1);
        var cellDeleteRow = row.insertCell(2);
        var cellCheck = row.insertCell(3);

        cellName.innerHTML = event.target.value;
        cellState.innerHTML = "Active";

        var btn = document.createElement("BUTTON");
        var textNode = document.createTextNode("Delete");
        btn.appendChild(textNode);
        cellDeleteRow.appendChild(btn);

        var checkbox = document.createElement("INPUT");
        checkbox.type = "checkbox";
        cellCheck.appendChild(checkbox);

        input.value = "";   // clear input field
    }
});

var btnActive = document.getElementById("task-active");
// filter active tasks (hide done)
btnActive.addEventListener("click", function () {
    filter("active");
});

var btnDone = document.getElementById("task-done");
// filter done tasks (hide active)
btnDone.addEventListener("click", function () {
    filter("done");
});

var btnAll = document.getElementById("task-all");
// show all tasks
btnAll.addEventListener("click", function () {
    filter("all");
});

// filter list by task's state
function filter(state) {

    var rows = table.rows;
    var revertState;

    if (state == "active") {
        revertState = "done";
    } else {
        revertState = "active";
    }

    for (var i = 1; i < rows.length; i++) {

        var rowState =  rows[i].getAttribute("data-state");

        switch (state) {
            case "active":
            case "done":
                if (rowState == revertState) {
                    rows[i].style.display = "none";
                } else {
                    rows[i].style.display = "table-row";
                }
                break;
            case "all":
                for (var j = 1; j < rows.length; j++) {
                    rows[j].style.display = "table-row";
                }
                break;
        }
    }
}

// remove all tasks or only selected
function removeAllTasks() {
    var list = table.rows;
    var checkedRows = checkList.getRows();

    if (checkedRows.length == 0) {
        // remove all rows
        for (var i = list.length-1; i > 0; i--) {
            table.deleteRow(list[i].rowIndex);
        }
    } else {
        // remove only checked rows
        var reverseRows = checkedRows.slice(0).reverse();
        for (var i in reverseRows) {
            table.deleteRow(reverseRows[i]);
            // clear list from deleted row indexes
            checkList.processRowIndex(reverseRows[i], false);
        }
    }
}

// change state of tasks
function changeState(state) {
    var checkedRows = checkList.getRows();
    var rows = table.rows;
    var label;

    if (state == "active") {
        label = "Active";
    } else {
        label = "Done";
    }

    if (checkedRows.length == 0) {
        // check ALL rows
        for (var i = 1; i < rows.length; i++) {
            rows[i].setAttribute("data-state", state);
            rows[i].cells[1].innerHTML = label;
        }
    } else {
        // check ONLY SELECTED
        checkedRows.forEach(function(item) {
            rows[item].setAttribute("data-state", state);
            rows[item].cells[1].innerHTML = label;
        });
    }
}

