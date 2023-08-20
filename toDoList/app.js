window.addEventListener('load', ()=>{
    todos = JSON.parse(localStorage.getItem('todos')) || [];
    const nameInput = document.querySelector('#name');
    const newTodoForm = document.querySelector('#newToDoList');

    const username = localStorage.getItem('username') || '';
    nameInput.value = username;

    nameInput.addEventListener('change', e=>{
        localStorage.setItem('username',e.target.value);
    })

    newTodoForm.addEventListener('submit', e=>{
        e.preventDefault();
        const todo={
            content: e.target.elements.content.value,
            category: e.target.elements.category.value,
            done:false,
            createAt: new Date().getTime(),
        }

        todos.push(todo);
        localStorage.setItem('todos',JSON.stringify(todos));

        e.target.reset();

        DisplayTodos();
    })
    DisplayTodos();
})

function DisplayTodos() {

    const todoList = document.querySelector('#ToDo-List');

    todoList.innerHTML = '';

    todos.sort((a, b) => a.createAt - b.createAt).forEach(todo => {
        const todoItem = document.createElement('div');
        todoItem.classList.add('toDoItem')

        const label = document.createElement('label');
        const input = document.createElement('input');
        const span = document.createElement('span');
        const content = document.createElement('div');
        const actions = document.createElement('div');
        const edit = document.createElement('button');
        const deleteButton = document.createElement('button');
        
        input.type = 'checkbox';
        input.checked = todo.done;
        span.classList.add('bubble');

    
        if(todo.category == 'personal'){
            span.classList.add('personal');
        }
        else if(todo.category == 'business'){
            span.classList.add('business');
        }

        content.classList.add('toDoContent');
        actions.classList.add('actions');
        edit.classList.add('edit');
        deleteButton.classList.add('delete');

        content.innerHTML = `<input type="text" value="${todo.content}" readonly>`;
        edit.innerHTML = 'Edit';
        deleteButton.innerHTML = 'Delete';

        label.appendChild(input);
        label.appendChild(span);
        actions.appendChild(edit);
        actions.appendChild(deleteButton);
        todoItem.appendChild(label);
        todoItem.appendChild(content);
        todoItem.appendChild(actions);

        todoList.appendChild(todoItem);

        if(todo.done){
            todoItem.classList.add('done');
        }

        input.addEventListener('click', e=>{
            todo.done = e.target.checked;
            localStorage.setItem('todos', JSON.stringify(todos));

            if(todo.done){
                todoItem.classList.add('done');
            } else {
                todoItem.classList.remove('done');
            }
            DisplayTodos();
        })

        edit.addEventListener('click', e=>{
            const input = content.querySelector('input');
            input.removeAttribute('readonly');
            input.focus();
            input.addEventListener('blur',e=>{
                input.setAttribute('readonly', true);
                todo.content = e.target.value;
                localStorage.setItem('todos', JSON.stringify(todos));
                DisplayTodos();
            })
        })

        deleteButton.addEventListener('click', e=>{
            todos = todos.filter(t=>t != todo);
            localStorage.setItem('todos',JSON.stringify(todos));
            DisplayTodos();
        })

    })
    //addCategory();
}

// function addCategory(){

//     const addCategoryBtn = document.querySelector('#addCategory');
//     const optionsDiv = document.querySelector('#option');

//     addCategoryBtn.addEventListener('click', e=>{
//         const newCategoryLabel = document.createElement('label');
//         newCategoryLabel.classList.add('category-label');

//         const deleteCategoryBtn = document.createElement('button');
//         deleteCategoryBtn.classList.add('delCategory');
//         deleteCategoryBtn.title = 'delete category';
//         deleteCategoryBtn.textContent = '-';

//         const newCategoryPrompt = prompt("Add a new Category:", "Name: health");
//         const newCategoryInput = document.createElement('input');
//         newCategoryInput.type = 'radio';
//         newCategoryInput.name = 'category';
//         newCategoryInput.value = newCategoryPrompt;

//         const newCategorySpan = document.createElement('span');
//         newCategorySpan.classList.add(`bubble ${newCategoryPrompt}`);
//         newCategorySpan.textContent = newCategoryPrompt;

//         newCategoryLabel.appendChild(deleteCategoryBtn);
//         newCategoryLabel.appendChild(newCategoryInput);
//         newCategoryLabel.appendChild(newCategorySpan);

//         optionsDiv.appendChild(newCategoryLabel);

//     })
// }
