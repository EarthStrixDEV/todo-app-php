const theme_switch = document.querySelector(".theme_switch");
const data_todo_list = document.querySelectorAll(".data_todo_list");
const todo_track_input = document.getElementsByName("todo_track_input")[0];
const main_container = document.getElementById("main_container");
const menu_footer = document.querySelector(".menu_footer");
const count_list = document.querySelector(".count_list");
const background_image = document.querySelector("img[alt='background_image']");
const form_input_insert_data = document.getElementById(
    "form_input_insert_data"
);
var p = document.querySelectorAll("p");
var small = document.querySelector("small");
var toggle_state = true;

function counter_list() {
    let counter = 0;
    for (let index = 0; index < data_todo_list.length; index++) {
        counter += 1;
    }
    return counter;
}

count_list.innerHTML = `${ counter_list().toString() } items left`;

for (let index = 0; index < data_todo_list.length; index++) {
    const element = data_todo_list[index];
    let check_input = element.querySelector("input[type=checkbox]");
    check_input.addEventListener('click', (event) => {
        if (event.target.checked) {
            element.querySelector("p").classList.add("line-through");
        } else {
            element.querySelector("p").classList.remove("line-through");
        }
    })
}

form_input_insert_data.addEventListener("submit", (event) => {
    let check_empty = form_input_insert_data.querySelector('input[type=text]').value == 0 ? true : false;
    if (check_empty) {
        alert("Please enter your text before adding to the list");
        return false;
    } else {
        alert("Add to the list successfully");
        return true;
    }
})


theme_switch.addEventListener("click", (event) => {
    if (toggle_state) {
        main_container.classList.replace("bg-slate-900", "bg-white");
        theme_switch.innerHTML = `
            <path fill="#FFF" fill-rule="evenodd" d="M13 21a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-5.657-2.343a1 1 0 010 1.414l-2.121 2.121a1 1 0 01-1.414-1.414l2.12-2.121a1 1 0 011.415 0zm12.728 0l2.121 2.121a1 1 0 01-1.414 1.414l-2.121-2.12a1 1 0 011.414-1.415zM13 8a5 5 0 110 10 5 5 0 010-10zm12 4a1 1 0 110 2h-3a1 1 0 110-2h3zM4 12a1 1 0 110 2H1a1 1 0 110-2h3zm18.192-8.192a1 1 0 010 1.414l-2.12 2.121a1 1 0 01-1.415-1.414l2.121-2.121a1 1 0 011.414 0zm-16.97 0l2.121 2.12A1 1 0 015.93 7.344L3.808 5.222a1 1 0 011.414-1.414zM13 0a1 1 0 011 1v3a1 1 0 11-2 0V1a1 1 0 011-1z"/>
        `;
        background_image.src = "./images/bg-desktop-light.jpg";
        form_input_insert_data.classList.replace("bg-slate-800", "bg-white");
        todo_track_input.classList.replace("text-white", "text-dark");
        for (let i = 0; i < data_todo_list.length; i++) {
            const element = data_todo_list[i];
            const child_element = data_todo_list[i].querySelector("p");
            element.classList.replace("bg-slate-800", "bg-white");
            element.classList.replace("border-gray-600", "border-gray-200");
            child_element.classList.replace("text-gray-300", "text-gray-600");
        }
        menu_footer.classList.replace("bg-slate-800", "bg-white");
        toggle_state = !toggle_state;
    } else {
        main_container.classList.replace("bg-white", "bg-slate-900");
        theme_switch.innerHTML = `
            <path fill="#FFF" fill-rule="evenodd" d="M13 0c.81 0 1.603.074 2.373.216C10.593 1.199 7 5.43 7 10.5 7 16.299 11.701 21 17.5 21c2.996 0 5.7-1.255 7.613-3.268C23.22 22.572 18.51 26 13 26 5.82 26 0 20.18 0 13S5.82 0 13 0z"/>
        `;
        background_image.src = "./images/bg-desktop-dark.jpg";
        form_input_insert_data.classList.replace("bg-white", "bg-slate-800");
        todo_track_input.classList.replace("text-dark", "text-white");
        for (let i = 0; i < data_todo_list.length; i++) {
            const element = data_todo_list[i];
            const child_element = data_todo_list[i].querySelector("p");
            element.classList.replace("bg-white","bg-slate-800");
            element.classList.replace("border-gray-200","border-gray-600");
            child_element.classList.replace("text-gray-600", "text-gray-300");
        }
        menu_footer.classList.replace("bg-white","bg-slate-800");
        toggle_state = !toggle_state;
        event.preventDefault();
    }
});
