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
table.addEventListener("click", function (event) {
    if (event.target.tagName == "BUTTON") {
        var td = event.target.parentNode;
        var row = td.parentNode;
        table.deleteRow(row.rowIndex);
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