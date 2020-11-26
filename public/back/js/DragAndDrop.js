//List Drag and drop
var listItens = document.querySelectorAll('.draggable');
[].forEach.call(listItens, function (item) {
    addEventsDragAndDrop(item);
});

function addEventsDragAndDrop(el) {
    el.addEventListener('dragstart', dragStart, false);
    el.addEventListener('dragenter', dragEnter, false);
    el.addEventListener('dragover', dragOver, false);
    el.addEventListener('dragleave', dragLeave, false);
    el.addEventListener('drop', dragDrop, false);
    el.addEventListener('dragend', dragEnd, false);
}

function dragStart(e) {
    if (downed == false) {
        this.style.opacity = '0.4';
        dragSrcEl = this;
        e.dataTransfer.effectAllowed = 'move';
        e.dataTransfer.setData('text/html', this.innerHTML);
    }
}

function dragEnter(e) {
    if (downed == false) {
        this.classList.add('over');
    }
}

function dragLeave(e) {
    if (downed == false) {
        e.stopPropagation();
        this.classList.remove('over');
    }
}

function dragOver(e) {
    if (downed == false) {
        e.preventDefault();
        e.dataTransfer.dropEffect = 'move';
        return false;
    }
}

function dragDrop(e) {
    if (downed == false) {

        if (dragSrcEl != this) {
            dragSrcEl.innerHTML = this.innerHTML;
            this.innerHTML = e.dataTransfer.getData('text/html');
            todatabase(dragSrcEl.id, this.id);
        }
    }
}

function dragEnd(e) {
    if (downed == false) {
        var listItens = document.querySelectorAll('.draggable');
        [].forEach.call(listItens, function (item) {
            item.classList.remove('over');
        });
        this.style.opacity = '1';
    }
}

function todatabase(src, dest) {

    $.ajax({
        type: 'post',
        url: "/back/order_up",
        data: {
            source: src,
            destination: dest,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'JSON',
        success: function (response) {
            //console.log(ok)
        },
        error: function () {
            console.log('Erreur');
        }
    });
}

// Table drag and drop

function addEventsDragAndDropTable(el) {
    el.addEventListener('dragstart', dragStartTable, false);
    el.addEventListener('dragenter', dragEnterTable, false);
    el.addEventListener('dragover', dragOverTable, false);
    el.addEventListener('dragleave', dragLeaveTable, false);
    el.addEventListener('drop', dragDropTable, false);
    el.addEventListener('dragend', dragEndTable, false);
}

var listrow = document.querySelectorAll('.dragtb');
[].forEach.call(listrow, function (row) {
    addEventsDragAndDropTable(row);
});


function dragDropTable(e) {
    if (dragSrcEl != this) {
        dragSrcEl.innerHTML = this.innerHTML;
        this.innerHTML = e.dataTransfer.getData('text/html');
        console.log(dragSrcEl.id);
       console.log(this.id);
         todatabaseTable(dragSrcEl.id, this.id);
    }
    return false;
}

function dragStartTable(e) {
    this.style.opacity = '0.4';
    dragSrcEl = this;
    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/html', this.innerHTML);
};

function dragEnterTable(e) {
    this.classList.add('over');
}

function dragLeaveTable(e) {
    e.stopPropagation();
    this.classList.remove('over');
}

function dragOverTable(e) {
    e.preventDefault();
    e.dataTransfer.dropEffect = 'move';
    return false;
}


function dragEndTable(e) {

    var listItens = document.querySelectorAll('.draggable');
    [].forEach.call(listItens, function (item) {
        item.classList.remove('over');
    });
    this.style.opacity = '1';
}

function todatabaseTable(src, dest) {

    $.ajax({
        type: 'post',
        url: "/back/order_up/quest",
        data: {
            source: src,
            destination: dest,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'JSON',
        success: function (response) {
            console.log("ok")
        },
        error: function () {
            console.log('Erreur');
        }
    });
}

