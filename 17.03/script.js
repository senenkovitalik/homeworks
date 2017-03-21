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

// створюємо масив відмічених рядків
var CheckList = function() {
    var rows = [];
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
        for (var m in reverseRows) {
            table.deleteRow(reverseRows[m]);
            // clear list from deleted row indexes
            checkList.processRowIndex(reverseRows[m], false);
        }
    }
}