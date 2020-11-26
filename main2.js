const todoList = document.querySelector("#todoList");
const todoForm = document.querySelector("#todoForm");
const todoSearch = document.querySelector("#todoSearch");
const todoTextarea = todoForm.querySelector('textarea');

todoForm.addEventListener("submit", e => {
    e.preventDefault();
    console.log(e);
    if (todoTextarea.value !== "") 
    {
        addTask(todoTextarea.value);
        todoTextarea.value = "";
    }
});

function addTask(text) {



    const element = document.createElement("div");
    element.classList.add("element");

    const elementInner = document.querySelector("#elementTemplate").content.cloneNode(true);

    element.append(elementInner);

    element.querySelector(".element-text").innerText = text;

    todoList.append(element);
    
    console.log("Działa");

    const del = document.createElement("button");
    del.innerText = "Usuń";
    del.classList.add("delete");
    del.addEventListener("click", e => {
        e.target.parentElement.remove();
    });

    element.appendChild(del);
    list.appendChild(element);

    console.log("Działa");

}